@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Permissions List</h1>
            <a href="{{ route('permissions.create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create Permission</a>
        </div>
        <x-message></x-message>
        <!-- Content Row -->


        <div class="row">
            <table class="table table-hover datatable-1 table table-bordered table-striped	 display">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px">#</th>
                        <th scope="col"> Name</th>
                        <th scope="col" style="width: 200px">Created</th>
                        <th scope="col" style="width: 200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>


                                {{-- <td> <span class="badge badge-success"><strong>Closed</strong></span></td> --}}
                                <td> @can('edit permissions')
                                        <a href="{{ route('permissions.edit', $permission->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
                                    @can('delete permissions')
                                        <a href="javascript:void(0);" onclick="deletePermission({{ $permission->id }})"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    @endcan

                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
            {{-- {{ $permissions->links() }} --}}
        </div>

        <!-- Content Row -->



        <!-- Content Row -->


    </div>
    {{-- <x-slot name="script"> --}}
    <script type="text/javascript">
        function deletePermission(id) {
            if (confirm("Are you sure to  delete?")) {
                $.ajax({
                    url: '{{ route('permissions.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}',
                    },
                    success: function(responce) {
                        window.location.href = '{{ route('permissions.index') }}';
                    }
                })
            }
        }
    </script>
    {{-- </x-slot> --}}
@endsection
