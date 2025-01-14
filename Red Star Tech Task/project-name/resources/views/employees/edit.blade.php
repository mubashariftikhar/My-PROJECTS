@extends('layout')

@section('content')
<h1>Edit Employee</h1>
<form action="{{ route('employee.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
    </div>
    <div class="form-group">
        <label>Designation</label>
        <input type="text" name="designation" class="form-control" value="{{ $employee->designation }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
