<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{

    protected $table='series';
    
    protected $fillable = [
        'name', 
        'watched', 
        'time_left',
        'user_id',
        'season',
        'episode'
    ];

    protected $casts = [
        'watched' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //
}
