@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Users List</h1>

            {{-- @can('create users') --}}
            <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create
                User</a>
            {{-- @endcan --}}

        </div>
        {{-- for error and sucess message import from components --}}
        <x-message></x-message>

        <!-- Content Row -->


        <div class="row">
            <table class="table table-hover datatable-1 table table-bordered table-striped	 display">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px">#</th>
                        <th scope="col"> Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col"> Roles</th>
                        <th scope="col" style="width: 200px">Created</th>
                        <th scope="col" style="width: 200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isNotEmpty())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> {{ $user->roles->pluck('name')->implode(', ') }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>


                                {{-- <td> <span class="badge badge-success"><strong>Closed</strong></span></td> --}}
                                <td> <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }})"
                                        class="btn btn-danger btn-sm">Delete</a>
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

    <script type="text/javascript">
        function deleteUser(id) {
            if (confirm("Are you sure to  delete?")) {
                $.ajax({
                    url: '{{ route('users.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}',
                    },
                    success: function(responce) {
                        window.location.href = '{{ route('users.index') }}';
                    }
                })
            }
        }
    </script>

@endsection
