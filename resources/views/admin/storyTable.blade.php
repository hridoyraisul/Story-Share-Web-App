@extends('admin.layout')
@section('title')
    Admin Dashboard | Story List
@endsection
@section('content')
    <hr>
    <h3>All Stories</h3>
    <hr>
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
            <th scope="col">Story Title</th>
            <th scope="col">Written by</th>
            <th scope="col">Current Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($adminStories as $key=> $st)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$st->title}}</td>
                <td>{{\App\Models\Client::where('id',$st->client_id)->first()->name}}</td>
                <td>@if($st->status === 'active') Active @else Block @endif</td>
                <td>
                    @if($st->status === 'active')
                        <a href="{{url('/admin/block-story/'.$st->id)}}" class="btn btn-sm btn-info">Block</a>
                    @else
                        <a href="{{url('/admin/active-story/'.$st->id)}}" class="btn btn-sm btn-success">Active</a>
                    @endif</td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
