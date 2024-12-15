@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users / Edit</h1>
            <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
        </div>

        <!-- Content Row -->
        <div class="row ml-2">
            <div class=" shadow-sm rounded col-md-6 ">
                <form class="pb-4 col-md-8" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"
                            placeholder="Enter Name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group ">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                            placeholder="Enter Name">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="grid grid-cols-4 mb-3">
                        @if ($roles->isNotEmpty())
                            @foreach ($roles as $role)
                                <div class="mt-3">

                                    <input {{ $hasRoles->contains($role->id) ? 'checked' : '' }} type="checkbox"
                                        class="rounded" name="role[]" id="role-{{ $role->id }}"
                                        value="{{ $role->name }}">
                                    <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

        </div>

        <!-- Content Row -->



        <!-- Content Row -->


    </div>
@endsection
