<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = App\User::all()->pluck('id')->toArray();
        $trips = factory(App\Trip::class, 10)->create();
        $trips->each(function (App\Trip $trip) use ($users) {
            $trip->users()->sync(array_slice($users, rand(0, count($users))));
        });
    }
}
