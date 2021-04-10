@extends('client.layout')
@section('title')
    Story-Share | Write Story
@endsection
@section('story-feed')
    <div class="container-fluid col-md-5">
        <h3>Hey! <strong style="color: #2a85a0">{{$client->name}}</strong> write a new story here !!</h3>
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <hr>
        <form action="{{url('/create-story')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label style="color: #2a85a0">Story Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter story title">
            </div>
            <div class="form-group">
                <label style="color: #2a85a0">Story Body</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                <label style="color: #2a85a0">Select Picture</label>
                <input type="file" name="picture" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: #2a85a0">Picture Caption</label>
                <input type="text" name="picture_caption" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: #2a85a0">Select Story Tag</label><br>
                <select class="selectpicker" name="tag[]" multiple data-live-search="true">
                    <option>Funny</option>
                    <option>Thriller</option>
                    <option>Romantic</option>
                    <option>Horror</option>
                    <option>Religious</option>
                    <option>Educative</option>
                    <option>Life-story</option>
                </select>
            </div>
            <br>
            <input name="client_id" type="hidden" value="{{session('client_id')}}">
            <button type="submit" class="btn btn-outline-dark">Add Story</button>
        </form><br><br>
    </div>
    <script>
        $('select').selectpicker();
    </script>
@endsection
