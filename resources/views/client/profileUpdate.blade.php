@extends('client.layout')
@section('title')
    {{$client->name}} | Settings
@endsection
@section('story-feed')
    <div class="container-fluid col-md-5">
        <h4>Hey! <strong style="color: #2a85a0">{{$client->name}}</strong> you can update your profile from here</h4>
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        @if(session('profile_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Great!</strong> {{session('profile_update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <hr>
        <form action="{{url('/settings-page')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Name</label>
                <input type="text" name="name" class="form-control" value="{{$client->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$client->email}}" disabled>
                <small>(Email can't change)</small>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputPassword1" style="color: #2a85a0">Password</label>--}}
{{--                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Phone</label>
                <input type="number" name="phone" class="form-control" value="{{$client->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{$client->dob}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" @if($client->gender === 'male') checked @endif>
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female" @if($client->gender === 'female') checked @endif>
                    <label class="form-check-label" for="exampleRadios2">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: #2a85a0">Profile Picture</label> &nbsp;
                <img style="border: 4px solid #2a85a0; border-radius: 10px;" width="80" height="80" src="{{asset('uploads/client-dp/'.$client->dp)}}"><br>
                <label for="exampleInputEmail1" style="color: #2a85a0">Choose new picture</label>
                <input type="file" name="dp" class="form-control">
            </div><br>
            <input type="hidden" name="client_id" value="{{$client->id}}">
            <button type="submit" class="btn btn-outline-dark">Update</button>
        </form><br><br>
    </div>
@endsection
