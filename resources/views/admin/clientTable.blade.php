@extends('admin.layout')
@section('title')
    Admin Dashboard | Client List
@endsection
@section('content')
    <hr>
    <h3>All Clients</h3>
    <hr>
    @if(session('success_delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Wow!</strong> {{session('success_delete')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('success_active'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Wow!</strong> {{session('success_active')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('success_block'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Yeee!</strong> {{session('success_block')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Current Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Client::all() as $key => $clientInfo)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$clientInfo->name}}</td>
            <td>{{$clientInfo->email}}</td>
            <td>{{$clientInfo->status}}</td>
            <td>
                @if($clientInfo->status === 'active')
                    <a href="{{url('/admin/block-client/'.$clientInfo->id)}}" class="btn btn-info btn-sm">Block</a>
                @else
                    <a href="{{url('/admin/active-client/'.$clientInfo->id)}}" class="btn btn-success btn-sm">Active</a>
                @endif
                <a href="{{url('/admin/remove-client/'.$clientInfo->id)}}" class="btn btn-danger btn-sm">Remove</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
