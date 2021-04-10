@extends('client.layout')
@section('title')
    Story-Share | Register
@endsection
@section('story-feed')
    <div class="container-fluid col-md-5">
        <h3>Not Register yet! Create an account now</h3>
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <hr>
        <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" style="color: #2a85a0">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter phone no" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Date of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                    <label class="form-check-label" for="exampleRadios2">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Profile Picture</label>
                <input type="file" name="dp" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </form><br><br>
    </div>
@endsection
