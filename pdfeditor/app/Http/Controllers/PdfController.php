<?php

namespace App\Http\Controllers;


use Fpdf\Fpdf;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader\PdfReader;
use setasign\Fpdi\PdfReader\PdfReaderException;
class PdfController extends Controller
{
    public function showForm()
    {
        return view('pdf_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        // Store the file in the 'storage/app/public/pdfs' directory
        $filePath = $request->file('pdf_file')->store('pdfs', 'public');

        // Get the file name and path
        $fileName = basename($filePath);
        $publicPath = public_path('pdfs');

        // Ensure the public path directory exists
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        // Copy the file to the public directory
        File::copy(storage_path('app/public/pdfs/' . $fileName), $publicPath . '/' . $fileName);

        // Save the file path to the database
        Pdf::create(['file_path' => $filePath]);

        // Redirect to the show route
        return redirect()->route('pdf.show', ['id' => Pdf::latest()->first()->id]);
    }
    public function show($id)
    {
        $data['pdf'] = Pdf::findOrFail($id);
        return view('show', $data);
    }




    public function addSignature(Request $request, $id)
    {
        $pdf = Pdf::findOrFail($id);

        // Decode the base64 signature
        $signatureData = $request->input('signature');
        $signatureImage = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureImage = base64_decode($signatureImage);

        // Save the signature image temporarily
        $signaturePath = public_path('temp_signature.png');
        File::put($signaturePath, $signatureImage);

        // Load the existing PDF
        $pdfPath = public_path('pdfs/' . $pdf->file_path);
        $outputPdfPath = public_path('signed_pdf/' . $pdf->file_path);

        try {
            // Create a new instance of FPDI
            $pdf = new Fpdi();

            // Import the existing PDF
            $pdf->setSourceFile($pdfPath);
            $tplId = $pdf->importPage(1);
            $pdf->AddPage();
            $pdf->useTemplate($tplId);

            // Set the position for the signature (e.g., bottom right)
            $pdf->SetXY(150, 250); // Adjust these values as needed

            // Add the signature image to the PDF
            $pdf->Image($signaturePath, 150, 250, 40, 20); // Adjust the position and size as needed

            // Output the new PDF
            $pdf->Output('F', $outputPdfPath);

            // Clean up the temporary signature image
            File::delete($signaturePath);

            return redirect()->back()->with('status', 'Signature added to PDF successfully!');
        } catch (PdfReaderException $e) {
            // Handle exceptions if something goes wrong
            return redirect()->back()->with('error', 'Error adding signature to PDF: ' . $e->getMessage());
        }
}
}
