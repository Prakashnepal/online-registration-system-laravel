<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student\Status;
use App\Models\Student\StudentRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view all-registration')->only(['totalList']);
        // $this->middleware('permission:edit permissions')->only(['edit']);
        // $this->middleware('permission:create permissions')->only(['create']);
        // $this->middleware('permission:delete permissions')->only(['destroy']);
    }
    public function index(Request $request)
    {
        $countStatus1 = StudentRegistration::where('status_id', 1)->count();
        $countStatus2 = StudentRegistration::where('status_id', 2)->count();
        $countStatus3 = StudentRegistration::where('status_id', 3)->count();
        // Calculate the total count
        $totalCount = $countStatus1 + $countStatus2 + $countStatus3;

        return view('admin.dashboard', [
            'countStatus1' => $countStatus1,
            'countStatus2' => $countStatus2,
            'countStatus3' => $countStatus3,
            'totalCount' => $totalCount,

        ]);
    }



    // public function totalList(Request $request)
    // {
    //     // Retrieve the search term
    //     $search = $request->input('search');
    //     // Apply search filters and include the related status data
    //     $students = StudentRegistration::with('status')
    //         ->where(function ($query) use ($search) {
    //             $query->where('s_first', 'like', "%$search%")
    //                 ->orWhere('s_middle', 'like', "%$search%")
    //                 ->orWhere('s_last', 'like', "%$search%")
    //                 ->orWhere('s_phone', 'like', "%$search%")
    //                 ->orWhere('s_email', 'like', "%$search%")
    //                 ->orWhereDate('created_at', 'like', "%$search%");
    //         })
    //         ->get(); // Execute the query and retrieve the filtered results

    //     // filter by date
    //     $query = StudentRegistration::query();
    //     $date = $request->date_filter;
    //     switch ($date) {
    //         case 'today':
    //             $query->whereDate('created_at', Carbon::today());
    //             break;
    //         case 'yesterday':
    //             $query->whereDate('created_at', Carbon::yesterday());
    //             break;
    //         case 'this_week':
    //             $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
    //             break;
    //         case 'last_week':
    //             $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
    //             break;
    //         case 'this_month':
    //             $query->whereBetween('created_at', Carbon::now()->month());
    //             break;
    //         case 'last_month':
    //             $query->whereBetween('created_at', Carbon::now()->subMonth()->month());
    //             break;
    //         case 'this_year':
    //             $query->whereBetween('created_at', Carbon::now()->year());
    //             break;
    //         case 'last_year':
    //             $query->whereBetween('created_at', Carbon::now()->subYear()->year());
    //             break;
    //     }
    //     $filter = $query->get();

    //     // Get all statuses
    //     $statuses = Status::all();

    //     // Return the view with the filtered students and other data
    //     return view('admin.total-registration', [
    //         'students' => $students,
    //         'statuses' => $statuses,
    //         'search' => $search,
    //         'filter' => $filter,
    //     ]);
    // }
    public function totalList(Request $request)
    {
        // Retrieve the search term and date filter
        $search = $request->input('search');
        $date_filter = $request->date_filter;

        // Build the query with search filters and date filters
        $query = StudentRegistration::with('status')
            ->where(function ($query) use ($search) {
                $query->where('s_first', 'like', "%$search%")
                    ->orWhere('s_middle', 'like', "%$search%")
                    ->orWhere('s_last', 'like', "%$search%")
                    ->orWhere('s_phone', 'like', "%$search%")
                    ->orWhere('s_email', 'like', "%$search%")
                    ->orWhereDate('created_at', 'like', "%$search%");
            });

        // Apply date filter
        switch ($date_filter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                break;
            case 'this_month':
                $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
                break;
            case 'last_month':
                $query->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]);
                break;
            case 'this_year':
                $query->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
                break;
            case 'last_year':
                $query->whereBetween('created_at', [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()]);
                break;
        }

        // Execute the query and retrieve the filtered results
        $students = $query->get();

        // Get all statuses
        $statuses = Status::all();

        // Return the view with the filtered students and other data
        return view('admin.total-registration', [
            'students' => $students,
            'statuses' => $statuses,
            'search' => $search,
            'date_filter' => $date_filter, // return the date filter as well for view context
        ]);
    }
}
