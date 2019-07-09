@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/movies" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class=" col-sm-2 col-form-label" for="name">Movie Name </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="movieName"  name="name" value="{{old('name')}}">
                        </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="control-label col-sm-2" for="watched">Watched </label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-control" id="watched" name="watched" value="watched" @if(old('watched')) checked @endif>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class=" col-sm-2 col-form-label" for="time">Time Left </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="time_left" name="time_left" value="{{old('time_left')}}">
                            </div>
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
                          <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                                                
                    <br>
                        <br>
                        
                    <table class="table" id="indexTable">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Watched</th>
                            <th scope="col">Time Left</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($movies as $movie)
                          <tr>
                            <th scope="row">{{$movie->id}}</th>
                            <td>{{$movie->name}}</td>
                            <td>{{$movie->watched?'yes':'no'}}</td>
                            <td>{{$movie->time_left}}</td>
                            <td>{{$movie->created_at->toFormattedDateString()}}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('movie/' . $movie->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;
                                <form action="/movie/delete" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$movie->id}}" id="movie_id" name="movie_id">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                   </form>
                            </div>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
