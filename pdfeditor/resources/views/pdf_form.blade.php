<!-- resources/views/pdf/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Upload PDF</h1>
        <form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pdf_file">Select PDF File</label>
                <input type="file" class="form-control-file" id="pdf_file" name="pdf_file" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload PDF</button>
        </form>
    </div>
</body>
</html>
