@extends('admin.admin-layouts.layout')
@section('main-section')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users / Create</h1>
            <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
        </div>

        <!-- Content Row -->
        <div class="row ml-2">
            <div class=" shadow-sm rounded col-md-6 ">
                <form class="pb-4 col-md-8" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Enter Name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group ">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Enter Email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group ">
                        <label for="">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                            placeholder="Enter Password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group ">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" value="{{ old('confirm_password') }}"
                            class="form-control" placeholder="Confirm Your Password">
                        @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="grid grid-cols-4 mb-3">
                        @if ($roles->isNotEmpty())
                            @foreach ($roles as $role)
                                <div class="mt-3">

                                    <input type="checkbox" class="rounded" name="role[]" id="role-{{ $role->id }}"
                                        value="{{ $role->name }}">
                                    <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>

        </div>

        <!-- Content Row -->



        <!-- Content Row -->


    </div>
@endsection
