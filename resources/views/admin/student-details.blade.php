@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Student Details</h1>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-hover datatable-1 table table-bordered table-striped display" width="100%">

                <tbody>


                    @php
                        $fullName =
                            $record->s_first .
                            ' ' .
                            ($record->s_middle ? $record->s_middle . ' ' : '') .
                            $record->s_last;
                        $parentName =
                            $record->g_first .
                            ' ' .
                            ($record->g_middle ? $record->g_middle . ' ' : '') .
                            $record->g_last;
                    @endphp

                    <tr>
                        <td><b> ID</b></td>
                        <td>{{ $record->id }}</td>
                        <td><b>Student Name</b></td>
                        <td> {{ $record->full_name }}</< /td>
                        <td><b>Reg Date</b></td>
                        <td>{{ $record->created_at }}</td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth </b></td>
                        <td>{{ $record->s_dob }}</td>
                        <td><b>Mobile No.</b></td>
                        <td>{{ $record->s_phone }} </td>
                        <td><b>Email</b></td>
                        <td>{{ $record->s_email }} </td>
                    </tr>
                    <tr>
                        <td><b>Gender </b></td>
                        <td>{{ $record->s_gender }}</td>
                        <td><b>Country</b></td>
                        <td>{{ $record->s_country }}</td>
                        <td><b>Province</b></td>
                        <td>{{ $record->s_province }}</td>

                    </tr>
                    <tr>
                        <td><b>District </b></td>
                        <td>{{ $record->s_district }}</td>
                        <td><b>City</b></td>
                        <td>{{ $record->s_city }}</td>
                        <td><b>Ward</b></td>
                        <td>{{ $record->s_ward }}</td>
                    </tr>

                    <tr>
                        <td><b>Guardian Name </b></td>
                        <td>{{ $parentName }}</td>
                        <td><b>Relation</b></td>
                        <td>{{ $record->relation }}</td>
                        <td><b>Guardian Phone</b></td>
                        <td>{{ $record->g_phone }}</td>
                    </tr>

                    <tr>
                        <td><b>Guardian Email </b></td>
                        <td>{{ $record->e_gmail }}</td>
                        <td><b>Emergency Contact</b></td>
                        <td>{{ $record->e_phone }}</td>

                    </tr>
                    <tr>
                        <td><b> College Name </b></td>
                        <td>{{ $record->college }}</td>
                        <td><b>Faculty</b></td>
                        <td>{{ $record->faculty }}</td>
                        <td><b> Percentage/CGPA</b></td>
                        <td>{{ $record->c_gpa }}</td>
                    </tr>
                    <tr>
                        <td><b> Country </b></td>
                        <td>{{ $record->c_country }}</td>
                        <td><b>Province</b></td>
                        <td>{{ $record->c_province }}</td>
                        <td><b> District</b></td>
                        <td>{{ $record->c_district }}</td>
                    </tr>
                    <tr>
                        <td><b>City</b></td>
                        <td>{{ $record->c_city }}</td>
                    </tr>
                    <tr>
                        <td colspan="1"><b> Intrested Course</b></td>
                        <td>{{ $record->s_course }}</td>
                        <td><b>How do you know about us ?</b></td>
                        <td>{{ $record->s_about }}</td>
                        <td colspan=""><b> </b></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><b> Referred By</b></td>
                        <td>{{ $record->referred }}</td>
                        <td><b>Others</b></td>
                        <td>{{ $record->r_others }}</td>
                        <td colspan=""><b> </b></td>
                        <td></td>
                    </tr>


                    @foreach ($remarks as $remark)
                        <tr>
                            <td><b>Remark</b></td>
                            <td colspan="5">{{ $remark->remark }} <b>Remark Date {{ $remark->rdate }}</b></td>
                        </tr>

                        <tr>
                            <td><b>Status</b></td>
                            <td colspan="5"
                                class="
                            @if ($remark->sstatus == 1) text-danger
                            @elseif($remark->sstatus == 2)
                                text-warning
                            @elseif($remark->sstatus == 3)
                                text-success
                            @else
                                text-muted @endif
                        ">
                                @if ($remark->sstatus == 1)
                                    Not Processed Yet
                                @elseif($remark->sstatus == 2)
                                    In Process
                                @elseif($remark->sstatus == 3)
                                    Closed
                                @else
                                    Unknown Status
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td><b>Final Status</b></td>

                        {{-- <td colspan="5" class="text-danger">
                            @if ($record && $record->status)
                                {{ $record->status->id == 1 ? 'Not Process Yet' : $record->status->name }}
                            @else
                                No Status Available
                            @endif

                        </td> --}}
                        <td>
                            <span style="font-size: 15px"
                                class="badge
                                        @if ($record && $record->status) @if ($record->status->id == 1)
                                                badge-danger
                                            @elseif ($record->status->id == 2)
                                                badge-warning
                                            @elseif ($record->status->id == 3)
                                                badge-success
                                            @else
                                                badge-secondary @endif
@else
badge-secondary
                                        @endif
                                    ">
                                <strong>
                                    @if ($record && $record->status)
                                        @if ($record->status->id == 1)
                                            Not Process Yet
                                        @elseif ($record->status->id == 2)
                                            In Process
                                        @elseif ($record->status->id == 3)
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

                    </tr>
                    <tr>

                        <td><b>Action</b></td>
                        @can('update remark')
                            <td><a type="button" href="{{ route('details.update', $record->id) }}"
                                    class="btn btn-primary">Take Action</a></td>
                        @endcan

                    </tr>


            </table>
        </div>

        <!-- Content Row -->


    </div>
@endsection
