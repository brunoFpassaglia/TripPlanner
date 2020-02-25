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
        'end_date',
        'is_public'
    ];
    
    
    /**
    * relationship with creators on user table
    */
    public function creator(){
        return $this->belongsTo(User::class);
    }

    /**
     * relationship with posts
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'trip_user', 'trip_id', 'user_id')->withTimestamps();
    }

    public function invitations(){
        return $this->hasMany(Invitation::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublicTrips($query){
        return $query->where('is_public', true);
    }
}
