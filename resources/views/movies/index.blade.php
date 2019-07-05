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

                    <table class="table">
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
                            <td><a href="/movie/{{$movie->id}}">{{$movie->name}}</a></td>
                            <td>{{$movie->watched}}</td>
                            <td>{{$movie->time_left}}</td>
                            <td>{{$movie->created_at->toFormattedDateString()}}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('movie/' . $movie->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;
                                <form action="{{url('movie', [$movie->id])}}" method="POST">
                                      <input type="hidden" name="_method" value="DELETE">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
