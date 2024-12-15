<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student\Status;
use App\Models\Student\StudentRegistration;
use App\Models\Student\StudentRemark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller\HasMiddleware;
use Illuminate\Routing\Controller\Middleware;

class StudentDetailController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view student-details')->only(['view']);
        $this->middleware('permission:update remark')->only(['showDetails']);
        // $this->middleware('permission:create roles')->only(['create']);
        // $this->middleware('permission:delete roles')->only(['destroy']);
    }

    public function view($id)
    {
        // Retrieve remarks with the specified fields and join with student_registrations
        $remarks = StudentRemark::select(
            'student_remarks.remark',
            'student_remarks.status_id as sstatus',
            // 'student_remarks.name as statusName',
            'student_remarks.created_at as rdate'
        )
            ->join('student_registrations', 'student_registrations.id', '=', 'student_remarks.studentid')
            ->where('student_remarks.studentid', $id)
            ->get();
        $student = StudentRegistration::find($id);
        $statuses = Status::all();
        // Pass the full name and records to the view
        return view('admin.student-details', [
            'record' => $student,
            // 'records' => $records,
            'statuses' => $statuses, // Pass the collection of statuses if needed
            'remarks' => $remarks,
        ]);
    }

    public function updateDetails(Request $request, $id)
    {
        // Validate and process the input
        $request->validate([
            'status' => 'required|exists:statuses,id', // Ensure status exists in the statuses table
            'remark' => 'required|string|max:255', // Adjust max length as needed
        ]);

        // Fetch the student
        $student = StudentRegistration::find($id);

        // Insert into remark table and update the status in a try-catch block
        try {
            // Insert into remark table
            StudentRemark::create([
                'studentid' => $id,
                'status_id' => $request->input('status'),
                'remark' => $request->input('remark'),
            ]);

            // Update the status in student_registration table
            $student->update(['status_id' => $request->input('status')]);

            // If successful, redirect to the student.details view with a success message
            return redirect()->route('student.details', ['id' => $id])
                ->with('success', 'Student status updated successfully');
        } catch (\Exception $e) {
            // If there's an error during the process, redirect back with the error message
            return back()->withErrors(['error' => 'An error occurred while updating the details.'])->withInput();
        }
    }




    public function  showDetails($id)
    {
        $status = Status::all();
        $student = StudentRegistration::find($id);

        return view('admin.updatestudent-details', [
            'id' => $id,
            'status' => $status,
            'record' => $student,
        ]);
    }
}
