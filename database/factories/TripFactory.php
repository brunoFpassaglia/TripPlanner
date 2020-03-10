<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trip;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

$factory->define(Trip::class, function (Faker $faker) {
    $users = App\User::all()->pluck('id')->toArray();
    $covers = Storage::disk('public')->allFiles('tripcovers');
    return [
        //
        'begin_date' => $faker->dateTimeBetween('now', '+6 days'),
        'end_date' => $faker->dateTimeBetween('+7 days', '+14 days'),
        'creator_id'=>$faker->randomElement($users),
        'title'=>$faker->country(),
        'description'=>$faker->sentence(8),
        'is_public'=>$faker->boolean(60),
        'cover'=>Arr::random($covers),
    ];
});
