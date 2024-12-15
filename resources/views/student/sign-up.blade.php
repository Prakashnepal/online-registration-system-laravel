@extends('student.layout')

@section('main-section')
    <div class="container">
        <form style="width: 50%">

            <div class="form-group ">
                <label for="">Full Name</label>
                <input type="text" class="form-control" id="" placeholder="Full Name">

            </div>
            <div class="form-group">
                <label for="">Email </label>
                <input type="email" class="form-control" id="" placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
