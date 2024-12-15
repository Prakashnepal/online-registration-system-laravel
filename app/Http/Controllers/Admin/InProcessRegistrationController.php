<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentRegistration;
use Illuminate\Http\Request;

class InProcessRegistrationController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view inprocess-registration')->only(['index']);
    }
    public function index()
    {

        $student = StudentRegistration::find(1);


        $records = StudentRegistration::where('status_id', '2')->get();

        // Pass the full name and records to the view
        return view('admin.in-process', [
            'records' => $records,
            'student' => $student,
        ]);
    }
}
