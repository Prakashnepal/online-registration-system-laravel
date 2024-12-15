<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentRegistration;
use Illuminate\Http\Request;

class NotProcessRegistrationController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view notpocess-registration')->only(['index']);
    }

    // $records = DB::table('table_name')->where('status', '!=', 'process')->get();
    public function index()
    {

        $student = StudentRegistration::find(1);

        $records = StudentRegistration::where('status_id', '1')->get();

        // Pass the full name and records to the view
        return view('admin.not-process', [
            'records' => $records,
            'student' => $student,
        ]);
    }



    // public function view($id)
    // {

    //     $student = StudentRegistration::find($id);
    //     // Pass the full name and records to the view
    //     return view('admin.student-details', [
    //         'record' => $student,
    //     ]);
    // }
}
