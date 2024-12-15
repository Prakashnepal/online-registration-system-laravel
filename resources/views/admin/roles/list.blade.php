@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Roles List</h1>
            @can('create roles')
                <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create
                    Roles</a>
            @endcan
        </div>
        <x-message></x-message>
        <!-- Content Row -->


        <div class="row">
            <table class="table table-hover datatable-1 table table-bordered table-striped	 display">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px">#</th>
                        <th scope="col"> Name</th>
                        <th scope="col"> Permission</th>
                        <th scope="col" style="width: 200px">Created</th>
                        <th scope="col" style="width: 200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($roles->isNotEmpty())
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td> {{ $role->permissions->pluck('name')->implode(', ') }}</td>
                                <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}</td>


                                {{-- <td> <span class="badge badge-success"><strong>Closed</strong></span></td> --}}
                                <td> @can('edit roles')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
                                    @can('delete roles')
                                        <a href="javascript:void(0);" onclick="deleteRole({{ $role->id }})"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    @endcan

                                </td>
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
        function deleteRole(id) {
            if (confirm("Are you sure to  delete?")) {
                $.ajax({
                    url: '{{ route('roles.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}',
                    },
                    success: function(responce) {
                        window.location.href = '{{ route('roles.index') }}';
                    }
                })
            }
        }
    </script>
    {{-- </x-slot> --}}
@endsection
