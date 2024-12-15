@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Not Process Registration</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-hover datatable-1 table table-bordered table-striped	 display">
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
                        @foreach ($records as $record)
                            @php

                                $fullName =
                                    $record->s_first .
                                    ' ' .
                                    ($record->s_middle ? $record->s_middle . ' ' : '') .
                                    $record->s_last;
                            @endphp
                            <td>{{ $record->id }}</td>
                            <td>{{ $fullName }}</td>
                            <td>{{ $record->created_at }}</td>

                            <td> <span class="badge badge-danger"><strong>Not Process Yet</strong></span></td>
                            @can('view student-details')
                                <td> <a href="{{ route('student.details', $record->id) }}" class="btn btn-primary btn-sm"> View
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
