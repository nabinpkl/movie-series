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
        return 
    }

    public function create()
    {
            
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
