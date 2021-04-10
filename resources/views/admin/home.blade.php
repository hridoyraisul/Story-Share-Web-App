@extends('admin.layout')
@section('title')
    Admin Dashboard | Story Share
@endsection
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Dashboard</h1>
        <hr class="my-4">
        <p class="lead">Total Clients: {{\App\Models\Client::all()->count()}}</p>
        <p>Active Client: {{\App\Models\Client::where('status','active')->count()}}</p>
        <p>Deactivated Client: {{\App\Models\Client::where('status','deactive')->count()}}</p>
        <hr class="my-4">
        <p class="lead">Total Story Shared: {{\App\Models\Story::all()->count()}}</p>
        <p>Blocked Story: {{\App\Models\Story::where('status','block')->count()}}</p>
        <p>Active Story: {{\App\Models\Story::where('status','active')->count()}}</p>
        <a class="btn btn-outline-dark btn-lg" target="_blank" href="{{url('/')}}" role="button">Visit Main Website</a>
    </div>
@endsection
