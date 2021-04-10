@extends('client.layout')
@section('title')
    Story-Share | Home
@endsection
@section('story-feed')
<div class="container"><br>
    @if(session('client_id'))
        <a href="{{url('/create-story')}}" class="btn btn-outline-dark col-md-2">Add New Story</a>
    @endif
    <h1 style="color: #1b788a; text-align: center">All Stories</h1>
    <div class="container-body searchcardall"><br>
        @if($allStories != null)
            @foreach($allStories as $story)
        <div class="card searchcard text-white bg-dark">
            <div class="card-header">
                Written by <strong style="color: #0e90d2">{{\App\Models\Client::where('id',$story->client_id)->first()->name}}</strong> <img style=" border-radius: 100px;" width="40" height="40" src="{{asset('uploads/client-dp/'.\App\Models\Client::where('id',$story->client_id)->first()->dp)}}">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$story->title}}</h5> <h6 style="color: navajowhite">@if($story->reaction) {{$story->reaction}} @else 0 @endif <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg> </h6>
                <p class="card-text">{{substr($story->body,0,200)}} ......</p>
                @if($story->tag)
                    @foreach(json_decode(json_encode($story->tag),true) as $tag)
                        <button class="btn btn-sm btn-info">{{$tag}}</button>
                    @endforeach
                @endif
                <p class="card-text"><small class="text-muted">Published on {{\Illuminate\Support\Carbon::parse($story->created_at)->diffForHumans()}}</small></p>
            </div>
            <p>&nbsp; &nbsp;<a href="{{url('/view-story/'.$story->id)}}" class="btn btn-sm btn-outline-light col-md-2">Read Full Story</a></p>
{{--            <img src="..." class="card-img-bottom" alt="...">--}}
        </div><br>
            @endforeach
        @else
            <h3>Sorry!! No Story Available</h3>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".searchBox").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".searchcardall .searchcard").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
