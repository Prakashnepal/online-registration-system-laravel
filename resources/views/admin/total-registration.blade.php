@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Registration List</h1>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="get">
                    <input class="form-control mr-sm-2" name="search" type="search" value="{{ request('search') }}"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            {{-- <div class="col-md-6" style="margin-left: 500px">
                <form class="form-inline" method="get">
                    <select class="form-control mr-sm-2 col-md-6 " id="exampleFormControlSelect1">
                        <option>1</option>

                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div> --}}
            <table class="table table-hover datatable-1 table table-bordered table-striped	 display">


                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th colspan="5" scope="col">Filter By Date :
                            <form class="form-inline" method="get">
                                <select class="form-control mr-sm-2 col-md-3 " name="date_filter">
                                    <option>All Dates</option>
                                    <option value="today">Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="this_week"> This Week</option>
                                    <option value="last_week"> Last Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="this_year">This Year</option>
                                    <option value="last_year">Last Year</option>


                                </select>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filter</button>
                            </form>

                        </th>
                        {{-- <th scope="col">Reg Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Reg Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        @foreach ($students as $student)
                            @php

                                $fullName =
                                    $student->s_first .
                                    ' ' .
                                    ($student->s_middle ? $student->s_middle . ' ' : '') .
                                    $student->s_last;
                            @endphp
                            <td>{{ $student->id }}</td>
                            <td>{{ $fullName }}</td>
                            <td>{{ $student->created_at }}</td>

                            <td>
                                <span
                                    class="badge
                                            @if ($student && $student->status) @if ($student->status->id == 1)
                                                    badge-danger
                                                @elseif ($student->status->id == 2)
                                                    badge-warning
                                                @elseif ($student->status->id == 3)
                                                    badge-success
                                                @else
                                                    badge-secondary @endif
@else
badge-secondary
                                            @endif
                                        ">
                                    <strong>
                                        @if ($student && $student->status)
                                            @if ($student->status->id == 1)
                                                Not Process Yet
                                            @elseif ($student->status->id == 2)
                                                In Process
                                            @elseif ($student->status->id == 3)
                                                Closed
                                            @else
                                                Unknown Status
                                            @endif
                                        @else
                                            No Status Available
                                        @endif
                                    </strong>
                                </span>
                            </td>
                            @can('view student-details')
                                <td> <a href="{{ route('student.details', $student->id) }}" class="btn btn-primary btn-sm"> View
                                        Details</a>
                                </td>
                            @endcan
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!-- Content Row -->



        <!-- Content Row -->


    </div>
@endsection
