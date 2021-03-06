<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * relationship with trips, by owning them 
     */
    public function ownsTrip(){
        return $this->hasMany(Trip::class, 'creator_id');
    }
    
    
    /**
     * relationship with posts
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function invitations(){
        return $this->hasMany(Invitation::class);
    }

    public function trips(){
        return $this->belongsToMany(Trip::class, 'trip_user', 'user_id', 'trip_id')->withTimestamps();
    }

    public function scopeOfName($query, $name){
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }
}
