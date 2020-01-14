<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'begin_date',
        'end_date'
    ];
    
    
    /**
    * relationship with creators on user table
    */
    public function creator(){
        return $this->belongsTo(User::class);
    }
}
