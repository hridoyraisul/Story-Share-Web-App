@extends('client.layout')
@section('title')
    {{$client->name}} | Profile
@endsection
@section('story-feed')
    <div class="container"><br>
        <div class="col-md-6">
            <div class="card text-white bg-dark mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="border: 5px solid ghostwhite; border-radius: 100px;" width="180" height="180" src="{{asset('uploads/client-dp/'.$client->dp)}}" alt="{{$client->name}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{$client->name}}</h4>
                            <p>({{\App\Models\Story::where('client_id',$client->id)->count()}} story shared till now)</p>
{{--                            <hr class="my-4">--}}
                            <p class="lead">
                                <a class="btn btn-outline-light btn-sm" href="{{url('/my-story')}}" role="button">View Your Story</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="jumbotron">
            <h1 class="display-8">Personal Information</h1>
            <p class="lead">Contact No: {{$client->phone}}</p>
            <p class="lead">Email Address: {{$client->email}}</p>
            <p class="lead">Date of Birth: {{(Carbon\Carbon::parse($client->dob)->format('d M Y') )}}</p>
            <p class="lead">Gender: {{$client->gender}}</p>
            <p class="lead">
                <a class="btn btn-dark btn-sm" href="{{url('/settings-page')}}" role="button">Update Your Information</a>
            </p>
        </div>
    </div>
@endsection
