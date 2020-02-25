<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{

    protected $fillable = [
        'trip_id',
        'user_id',
    ];
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function trip(){
        return $this->belongsTo(Trip::class);
    }
}
