<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Series;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $series=Series::all();
        return view('series.index',compact('series'));
    }

    public function create()
    {
            return view('series.create');
    }

    public function store(Request $request)
    {
      $validatedData=  $request->validate([
            'name'=>'required|max:255',
            'time_left'=>'max:255',
            'season'=>'max:255',
            'episode'=>'max:255',
        ]);
        $series = new Series();
        $series->user_id = Auth::id();
        $series->name = $validatedData['name'];
        $series->watched = $request->has('watched')?1:0;
        $series->time_left = $validatedData['time_left'];
        $series->season = $validatedData['season'];
        $series->episode = $validatedData['episode'];
        $series->save();
        return redirect('series');
    }

    public function edit($id)
    {
        $series=Series::findOrFail($id);
        return view('series.edit',compact('series'));            
    }

    public function update(Request $request)
    {
        $validatedData=  $request->validate([
            'name'=>'required|max:255',
            'time_left'=>'max:255',
            'season'=>'max:255',
            'episode'=>'max:255',
        ]);
        $series=Series::findOrFail($request->series_id);
        $series->name = $validatedData['name'];
        $series->watched = $request->has('watched')?1:0;
        $series->time_left = $validatedData['time_left'];
        $series->season = $validatedData['season'];
        $series->episode = $validatedData['episode'];
        $series->save();
        return redirect('series');    
    }

    

    public function delete(Request $request)
    {
        $series=Series::findOrFail($request->series_id);
        $series->delete();
        return redirect('series');
        
    }
    
}
