<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    
    protected $fillable = [
        'title',
        'content',
        'trip_id',
    ];
    
    
    /**
    * relationship with trip
     */
     public function trip(){
        return $this->belongsTo(Trip::class);
    }

    /**
     * relationship with user
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
