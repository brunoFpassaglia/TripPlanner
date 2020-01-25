<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trip;
use Faker\Generator as Faker;

$factory->define(Trip::class, function (Faker $faker) {
    $users = App\User::all()->pluck('id')->toArray();
    return [
        //
        'begin_date' => $faker->dateTimeBetween('now', '+6 days'),
        'end_date' => $faker->dateTimeBetween('+7 days', '+14 days'),
        'creator_id'=>$faker->randomElement($users),
        'title'=>$faker->sentence(7),
        'description'=>$faker->sentence(15),
        'is_public'=>$faker->boolean(60),
    ];
});
