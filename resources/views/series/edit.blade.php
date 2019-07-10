@extends('layouts.app')

@section('content')

<h1>Edit Series</h1>
<hr>
<form action="/series/edit" method="POST">
@csrf


<input type="hidden" value="{{$series->id}}" id="series_id" name="series_id">
<div class="form-group">
    <label for="name">series Name</label>
    <input type="text" class="form-control" id="seriesName"  name="name" value="{{old('name',$series->name)}}">
</div>

<div class="form-group">
    <label for="season">Season</label>
    <input type="text" class="form-control" id="season"  name="season" value="{{old('season',$series->season)}}">
</div>

<div class="form-group">
    <label for="episode">Episode</label>
    <input type="text" class="form-control" id="episode"  name="episode" value="{{old('episode',$series->episode)}}">
</div>
<div class="form-group">
    <label for="watched">Watched</label>
<input type="checkbox" class="form-control" id="watched" name="watched" value="watched" @if(old('watched',$series->watched)) checked @endif>
</div>

<div class="form-group">
    <label for="time">Time Left</label>
    <input type="text" class="form-control" id="time_left" name="time_left" value="{{old('time_left',$series->time_left)}}">
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