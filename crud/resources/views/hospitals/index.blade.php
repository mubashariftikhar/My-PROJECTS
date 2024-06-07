<!-- resources/views/hospitals/index.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
    <div class="container">
        <h1>Hospitals</h1>
        <a href="{{ route('hospitals.create') }}" class="btn btn-primary">Add New Hospital</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hospitals as $hospital)
                    <tr>
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->name }}</td>
                        <td>{{ $hospital->address }}</td>
                        <td>
                            <a href="{{ route('hospitals.show', $hospital) }}" class="btn btn-info">View</a>
                            <a href="{{ route('hospitals.edit', $hospital) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('hospitals.destroy', $hospital) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
   

