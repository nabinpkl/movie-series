@extends('layouts.app')

@section('content')

<h1>Add New Task</h1>
<hr>
<form action="/movies" method="POST">
@csrf
<div class="form-group">
    <label for="name">Movie Name</label>
    <input type="text" class="form-control" id="movieName"  name="name">
</div>

<div class="form-group">
    <label for="watched">Watched</label>
    <input type="checkbox" class="form-control" id="watched" name="watched" value="watched">
</div>

<div class="form-group">
    <label for="time">Time Left</label>
    <input type="time" step=1 class="form-control" id="time_left" name="time_left">
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