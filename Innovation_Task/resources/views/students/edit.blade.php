<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel 11 CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('students.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Student</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('students.update', $student->id) }}"
                        method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Name</label>
                                <input value="{{ old('name', $student->name) }}" type="text"
                                    class="@error('name') is-invalid @enderror form-control-lg form-control"
                                    placeholder="Name" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="father_name" class="form-label h5">Father Name</label>
                                <input value="{{ old('father_name', $student->father_name) }}" type="text"
                                    class="@error('father_name') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Father Name" name="father_name">
                                @error('father_name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>  
                            <div class="mb-3">
                                <label for="dob" class="form-label h5">Date Of Birth</label>
                                <input
                                    value="{{ old('dob', $student->dob ? \Carbon\Carbon::parse($student->dob)->format('Y-m-d') : '') }}"
                                    type="text"
                                    class="datepicker form-control form-control-lg @error('dob') is-invalid @enderror"
                                    placeholder="Date Of Birth" name="dob" id="dob" data-datepicker>
                                @error('dob')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cnic" class="form-label h5">CNIC</label>
                                <input value="{{ old('cnic', $student->cnic) }}" type="text"
                                    class="@error('cnic') is-invalid @enderror form-control form-control-lg"
                                    placeholder="CNIC" name="cnic">
                                @error('cnic')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label h5">Phone Number</label>
                                <input value="{{ old('phone', $student->phone) }}" type="text"
                                       pattern="[0-9]{11}" 
                                       class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                       placeholder="Phone" name="phone" maxlength="11" minlength="11" required>
                                @error('phone')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                <div class="form-text">Please enter exactly 11 digits without any spaces or special characters.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="father_cnic" class="form-label h5"> Father CNIC</label>
                                <input value="{{ old('father_cnic', $student->father_cnic) }}" type="text"
                                    class="@error('father_cnic') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Father CNIC" name="father_cnic">
                                @error('father_cnic')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="degree_id" class="form-label">Degree</label>
                                <select class="form-control" id="degree_id" name="degree_id">
                                    @foreach ($degrees as $degree)
                                        <option value="{{ $degree->id }}"
                                            {{ $student->degree_id == $degree->id ? 'selected' : '' }}>
                                            {{ $degree->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('degree_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="stdclass_id" class="form-label">Class</label>
                                <select class="form-control" id="stdclass_id" name="stdclass_id">
                                    @foreach ($stdclasses as $stdclass)
                                        <option value="{{ $stdclass->id }}"
                                            {{ $student->stdclass_id == $stdclass->id ? 'selected' : '' }}>
                                            {{ $stdclass->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('stdclass_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label h5">Address</label>
                                <textarea placeholder="Address" class="form-control" name="address" cols="30" rows="5">{{ old('address', $student->address) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label h5">Status</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_active"
                                        value="active" {{ $student->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="status_inactive" value="inactive"
                                        {{ $student->status == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">Inactive</label>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label h5">Scholarships</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="1" name="scholarships[]" {{ in_array('1', $student->scholarships) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="1">
                                        Required
                                    </label>
                                </div>
                            </div> --}}
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('[data-datepicker]').datepicker({
            format: 'yyyy-mm-dd', // Format to match Laravel's date format
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

</html>
