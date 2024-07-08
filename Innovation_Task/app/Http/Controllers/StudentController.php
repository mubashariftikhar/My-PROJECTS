<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\StdClass;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // This method will show students page
    public function index() {
        $students = Student::orderBy('created_at','DESC')->get();

        return view('students.list',[
            'students' => $students
        ]);
    }

    // This method will show create student page
    public function create() {
        $data['stdclasses'] = StdClass::get();
        $data['degrees'] = Degree::get();
        return view('students.create', $data);
    }

    // This method will store a student in db
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'cnic' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'father_cnic' => 'required|string|max:255',
            'address' => 'required|string',
            'status' => 'required|in:active,inactive',
            'degree_id' => 'nullable|integer|exists:degrees,id',
            'stdclass_id' => 'nullable|integer|exists:stdclasses,id',
        ]);

        // Create a new instance of RealStudent model and populate it with validated data
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->father_name = $validatedData['father_name'];
        $student->dob = $validatedData['dob'];
        $student->cnic = $validatedData['cnic'];
        $student->phone = $validatedData['phone'];
        $student->father_cnic = $validatedData['father_cnic'];
        $student->address = $validatedData['address'];
        $student->status = $validatedData['status'];
        $student->degree_id = $request->degree_id;
        $student->stdclass_id = $request->stdclass_id;

        // Save the real student instance to the database
        $student->save();

        // Redirect to index page or any other page after successful creation
        return redirect()->route('students.index')
            ->with('success', 'Real student created successfully.');
    }


    // This method will show edit student page
    public function edit($id) {
        $data['student'] = Student::findOrFail($id);
        $data['stdclasses'] = StdClass::get();
        $data['degrees'] = Degree::get();
        return view('students.edit', $data);

    }

    // This method will update a student
    public function update($id, Request $request) {

        $student = Student::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'cnic' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'father_cnic' => 'required|string|max:255',
            'address' => 'required|string',
            'status' => 'required|in:active,inactive',
            'degree_id' => 'nullable|integer|exists:degrees,id',
            'stdclass_id' => 'nullable|integer|exists:stdclasses,id',         
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('students.edit',$student->id)->withInput()->withErrors($validator);
        }

        // here we will update student
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->dob = $request->dob;
        $student->cnic = $request->cnic;
        $student->phone = $request->phone;
        $student->father_cnic = $request->father_cnic;
        $student->address = $request->address;
        $student->status = $request->status ?? 'active';
        $student->degree_id = $request->degree_id;
        $student->stdclass_id = $request->stdclass_id;
        $student->save();       

        return redirect()->route('students.index')->with('success','Student updated successfully.');
    }

    // This method will delete a student
    public function destroy($id) {
        $student = Student::findOrFail($id);

       // delete image
       File::delete(public_path('uploads/students/'.$student->image));

       // delete student from database
       $student->delete();

       return redirect()->route('students.index')->with('success','Student deleted successfully.');
    }
}
