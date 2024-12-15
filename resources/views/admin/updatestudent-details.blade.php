@extends('admin.admin-layouts.layout')
@section('main-section')
    {{-- @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }

        function f3() {
            window.print();
        }
    </script> --}}
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Student Remark Status</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div style="margin-left:50px;">
                <form method="post" action="{{ route('details.update', ['id' => $id]) }}">
                    @csrf
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr height="50">
                            <td><b>Student Id -</b></td>
                            <td>{{ $record->id }}</td>
                        </tr>
                        <tr height="50">
                            <td><b>Status</b></td>
                            <td>
                                <select class="form-control" name="status" required>
                                    <option value="">Select Status</option>
                                    @foreach ($status as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                        <tr height="50">
                            <td><b>Remark</b></td>
                            <td>
                                <textarea class="form-control" name="remark" cols="50" rows="10" required="required"></textarea>
                            </td>
                        </tr>
                        <tr height="50">
                            <td>&nbsp;</td>
                            <td><input class="btn btn-primary" type="submit" name="update" value="Submit"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        {{-- <tr>
                            <td></td>
                            <td>
                                <input name="Submit2" type="button" class="txtbox4" value="Close this window"
                                    onClick="window.close();" style="cursor: pointer;" />
                            </td>
                        </tr> --}}
                    </table>
                </form>
            </div>
        </div>

        <!-- Content Row -->



        <!-- Content Row -->


    </div>
@endsection
