<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>
<body>
    
<div class="container">
    <h1>Create Hospital</h1>
    <form action="{{ route('hospitals.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="zip_code">Zip Code</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="official_email">Official Email</label>
            <input type="email" class="form-control" id="official_email" name="official_email">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website">
        </div>
        <div class="form-group">
            <label for="number_of_beds">Number of Beds</label>
            <input type="number" class="form-control" id="number_of_beds" name="number_of_beds">
        </div>
        <div class="form-group">
            <label for="number_of_staff">Number of Staff</label>
            <input type="number" class="form-control" id="number_of_staff" name="number_of_staff">
        </div>
        <div class="form-group">
            <label for="established_at">Established At</label>
            <input type="date" class="form-control" id="established_at" name="established_at">
        </div>
        <div class="form-group">
            <label for="white_logo">White Logo</label>
            <input type="text" class="form-control" id="white_logo" name="white_logo">
        </div>
        <div class="form-group">
            <label for="dark_logo">Dark Logo</label>
            <input type="text" class="form-control" id="dark_logo" name="dark_logo">
        </div>
        <div class="form-group">
            <label for="primary_color">Primary Color</label>
            <input type="text" class="form-control" id="primary_color" name="primary_color">
        </div>
        <div class="form-group">
            <label for="secondary_color">Secondary Color</label>
            <input type="text" class="form-control" id="secondary_color" name="secondary_color">
        </div>
        <div class="form-group">
            <label for="emergency_contact">Emergency Contact</label>
            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact">
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <div class="form-group">
            <label for="city_id">City</label>
            <select class="form-control" id="city_id" name="city_id">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="country_id">Country</label>
            <select class="form-control" id="country_id" name="country_id">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>                
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</body>
</html>