@extends('client.layout')
@section('title')
    Story-Share | Admin Login
@endsection
@section('story-feed')
    <div class="container-fluid col-md-5"><br>
        <h3>Login as Admin!</h3>
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        @if(session('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> {{session('success_message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Woops!</strong> {{session('error_message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <hr>
        <form action="{{url('/admin')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" style="color: #2a85a0">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </form><br>
{{--        <h5>Don't have an account? Go register now ...  <a style="text-decoration: none;" href="{{url('/register')}}">Click here for register</a></h5>--}}

        <br><br><br><br>
    </div>
@endsection
