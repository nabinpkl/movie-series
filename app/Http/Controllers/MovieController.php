<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movies=Movie::all();
        return view('movies.index',compact('movies'));
    }

    public function create()
    {
            return view('movies.create');
    }

    public function store(Request $request)
    {
      $validatedData=  $request->validate([
            'name'=>'required|max:255',
            'time_left'=>'max:255',
        ]);
        $movie = new Movie();
        $movie->user_id = Auth::id();
        $movie->name = $validatedData['name'];
        $movie->watched = $request->has('watched')?1:0;
        $movie->time_left = $validatedData['time_left'];
        $movie->save();
        return redirect('movies');
    }

    public function edit($id)
    {
        $movie=Movie::findOrFail($id);
        return view('movies.edit',compact('movie'));            
    }

    public function update(Request $request)
    {
        $validatedData=  $request->validate([
            'name'=>'required|max:255',
            'time_left'=>'max:255',
        ]);
        $movie=Movie::findOrFail($request->movie_id);
        $movie->name = $validatedData['name'];
        $movie->watched = $request->has('watched')?1:0;
        $movie->time_left = $validatedData['time_left'];
        $movie->save();
        return redirect('movies');    
    }

    

    public function delete(Request $request)
    {
        $movie=Movie::findOrFail($request->movie_id);
        $movie->delete();
        return redirect('movies');
        
    }
    
}
