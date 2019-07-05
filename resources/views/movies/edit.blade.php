@extends('layouts.app')

@section('content')

<h1>Edit Movie</h1>
<hr>
<form action="/movie/edit" method="POST">
@csrf


<input type="hidden" value="{{$movie->id}}" id="movie_id" name="movie_id">
<div class="form-group">
    <label for="name">Movie Name</label>
    <input type="text" class="form-control" id="movieName"  name="name" value="{{old('name',$movie->name)}}">
</div>

<div class="form-group">
    <label for="watched">Watched</label>
<input type="checkbox" class="form-control" id="watched" name="watched" value="watched" @if(old('watched',$movie->watched)) checked @endif>
</div>

<div class="form-group">
    <label for="time">Time Left</label>
    <input type="text" class="form-control" id="time_left" name="time_left" value="{{old('time_left',$movie->time_left)}}">
</div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
    
@endsection