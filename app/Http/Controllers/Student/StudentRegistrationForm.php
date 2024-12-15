<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegistrationRequest;
use App\Models\Student\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentRegistrationForm extends Controller
{
    public function index()
    {
        // $students = StudentRegistration::all();
        return view('student.index');
        // ->with('students', $students);
    }

    public function form()
    {
        return view('student.registration');
    }
    public function store(StudentRegistrationRequest $request)
    {
        // $request->validated() returns an array of validated data, not a validator instance
        $validatedData = $request->validated();

        // Since the validation has already passed, you can directly create the record
        StudentRegistration::create($validatedData);

        return redirect()->route('index')->with('success', 'Registration Successfully');
    }
}
