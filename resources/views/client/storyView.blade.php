@extends('client.layout')
@section('title')
    {{$story->title}}
@endsection
@section('story-feed')
    <div class="container">
        <div class="container-body"><br>
            <div class="jumbotron">
                <h2 class="display-4">{{$story->title}}</h2>
                <p><i>Published {{\Illuminate\Support\Carbon::parse($story->created_at)->diffForHumans()}}</i></p>
                <p class="lead">Written by <b style="color: #1f6377">{{\App\Models\Client::where('id',$story->client_id)->first()->name}}</b></p>
                <h6 style="color: red">@if($story->reaction) {{$story->reaction}} @else 0 @endif<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg> </h6>
                <hr class="my-4">
                @if($story->picture)
                    <img style="border: 5px solid darkslategrey; border-radius: 20px;" width="200" height="400" src="{{asset('uploads/story-pic/'.$story->picture)}}" alt="{{$story->title}}" class="card-img-bottom">
                @endif
                <p>{{$story->body}}</p><br>
                <br>
                <div class="row">
                    Love this story
                    <div class="col-md-2">
                        <form action="{{url('/view-story/'.$story->id)}}" method="post">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit" role="button">Love</button>
                        </form>
                    </div>
                </div><br>
                {{-------------Comment View Section--------------}}
                @if($comments)
                    <h3>Comments</h3><hr class="my-4">
                    @foreach($comments as $comment)
                        <p class="lead" style="color: #1f6377">{{\App\Models\Client::where('id',$comment->client_id)->first()->name}}</p>
                        <p>{{$comment->comment}}</p>
                        <p>(Posted {{\Illuminate\Support\Carbon::parse($story->created_at)->diffForHumans()}})</p>
                        <br>
                    @endforeach
                @else
                    <h3>Comments</h3><hr class="my-4">
                    <p>Nobody commented yet</p>
                @endif
                {{-------------Comment Add Section--------------}}
                @if(session('client_id'))
                <form action="{{url('/add-comment')}}" method="post">
                        @csrf
                        <input class="form-control" type="text" name="comment" placeholder="Write comment here"><br>
                        <input type="hidden" name="story_id" value="{{$story->id}}">
                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <button class="btn btn-outline-dark" type="submit" role="button">Add Comment</button>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
