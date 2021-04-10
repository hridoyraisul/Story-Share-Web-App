@extends('client.layout')
@section('title')
    {{$client->name}}'s Story
@endsection
@section('story-feed')
    <div class="container">
        <div class="container-body"><br>
            <a href="{{url('/create-story')}}" class="btn btn-outline-dark col-md-2">Add New Story</a><br><br>
            @if($myStories)
                @foreach($myStories as $story)
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{$story->title}}</h5>
                            <p class="card-text">{{substr($story->body,0,200)}} ......</p>
                            <p class="card-text"><small class="text-muted">Published {{\Illuminate\Support\Carbon::parse($story->created_at)->diffForHumans()}}</small></p>
                        </div>
                        <p>&nbsp; &nbsp;<a href="{{url('/view-story/'.$story->id)}}" class="btn btn-sm btn-outline-light col-md-2">View Full Story</a></p>
                    </div><br>
                @endforeach
            @else
                <h3>No Story Available</h3>
            @endif
        </div>
    </div>
@endsection
