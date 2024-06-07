<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Page</title>
</head>
<body>

<div class="container">
    <h1>Hospital Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $hospital->name }}
        </div>
        <div class="card-body">
            <p><strong>Address:</strong> {{ $hospital->address }}</p>
            <p><strong>Zip Code:</strong> {{ $hospital->zip_code }}</p>
            <p><strong>Phone:</strong> {{ $hospital->phone }}</p>
            <p><strong>Official Email:</strong> {{ $hospital->official_email }}</p>
            <p><strong>Website:</strong> <a href="{{ $hospital->website }}" target="_blank">{{ $hospital->website }}</a></p>
            <p><strong>Number of Beds:</strong> {{ $hospital->number_of_beds }}</p>
            <p><strong>Number of Staff:</strong> {{ $hospital->number_of_staff }}</p>
            <p><strong>Established At:</strong> {{ $hospital->established_at }}</p>
            <p><strong>White Logo:</strong> <img src="{{ $hospital->white_logo }}" alt="White Logo"></p>
            <p><strong>Dark Logo:</strong> <img src="{{ $hospital->dark_logo }}" alt="Dark Logo"></p>
            <p><strong>Primary Color:</strong> {{ $hospital->primary_color }}</p>
            <p><strong>Secondary Color:</strong> {{ $hospital->secondary_color }}</p>
            <p><strong>Emergency Contact:</strong> {{ $hospital->emergency_contact }}</p>
            <p><strong>Notes:</strong> {{ $hospital->notes }}</p>
            <p><strong>City:</strong> {{ $hospital->city->name }}</p>
            <p><strong>Country:</strong> {{ $hospital->country->name }}</p>
        </div>
    </div>
    <a href="{{ route('hospitals.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>

</body>
</html>