<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return redirect('movies');
    }

    public function edit($id)
    {
            
    }

    public function show($id)
    {
            
    }

    public function delete($id)
    {
            
    }
    
}
