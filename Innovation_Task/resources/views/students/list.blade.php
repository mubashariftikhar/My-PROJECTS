<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel 11 CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('students.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-12 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>    
            @endif            
            <div class="col-md-12">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Students</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>DOB</th>
                                <th>CNIC</th>
                                <th>Phone</th>
                                <th>Degree</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                            @if ($students->isNotEmpty())
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>{{ $student->cnic }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->degree->name }}</td>
                                <td>{{ $student->stdclass->class_name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Student Actions">
                                        <a href="{{ route('students.edit',$student->id) }}" class="btn btn-dark">Edit</a>
                                        <a href="#" onclick="deleteStudent({{ $student->id }});" class="btn btn-danger">Delete</a>
                                        <form id="delete-student-from-{{ $student->id }}" action="{{ route('students.destroy',$student->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                                
                            </tr>   
                            @endforeach
                            @endif
                            
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>

<script>
    function deleteStudent(id) {
        if (confirm("Are you sure you want to delete student?")) {
            document.getElementById("delete-student-from-"+id).submit();
        }
    }
</script>