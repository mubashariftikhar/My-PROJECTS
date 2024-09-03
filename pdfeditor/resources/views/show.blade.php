<!-- resources/views/pdf/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>View PDF</title>
    <title>Sign PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/4.0.0/signature_pad.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/4.0.0/signature_pad.min.js"></script>
</head>
<style>
    .signature-box {
        border: 2px solid #000;
        padding: 20px;
        width: 420px;
        margin: 20px auto;
        text-align: center;
    }

    canvas {
        border: 1px solid #000;
    }

    button {
        margin: 5px;
        padding: 10px;
    }
</style>

<body>
    <div class="container mt-5">
        <h1>View PDF</h1>

        {{-- @dd((asset($pdf->file_path))); --}}
        <!-- Display the PDF -->
        {{-- @if (file_exists(asset($pdf->file_path))) --}}
        <iframe src="{{ asset($pdf->file_path) }}" width="100%" height="600px" style="border: none;"></iframe>
        {{-- @else
            <p>Sorry, the PDF file could not be found.</p>
        @endif --}}
        <!-- Signature Form -->
        <form action="{{ route('pdf.addSignature', $pdf->id) }}" method="POST" id="signatureForm">
            @csrf
            <input type="hidden" name="signature" id="signatureData">
            <div class="signature-box">
                <canvas id="signature-pad" width="400" height="200" style="border:1px solid #000;"></canvas>
                <button type="submit" class="btn btn-primary">Add Signature</button>
                <button type="button" id="clear-signature" class="btn btn-secondary">Clear</button>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('signature-pad');
                const ctx = canvas.getContext('2d');
                let drawing = false;

                canvas.addEventListener('mousedown', (e) => {
                    drawing = true;
                    ctx.beginPath();
                    ctx.moveTo(e.offsetX, e.offsetY);
                });

                canvas.addEventListener('mousemove', (e) => {
                    if (drawing) {
                        ctx.lineTo(e.offsetX, e.offsetY);
                        ctx.stroke();
                    }
                });

                canvas.addEventListener('mouseup', () => {
                    drawing = false;
                });

                document.getElementById('clear-signature').addEventListener('click', () => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                });

                document.getElementById('signatureForm').addEventListener('submit', function(event) {
                    // Capture signature as data URL
                    const signatureDataURL = canvas.toDataURL('image/png');

                    // Set the data URL to the hidden input field
                    document.getElementById('signatureData').value = signatureDataURL;
                });
            });
        </script>

</body>

</html>
