<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUsersTripsWhenDeletingTrips extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('trip_user', function (Blueprint $table) {
            //
            $table->dropForeign('trip_user_trip_id_foreign');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('trip_users', function (Blueprint $table) {
            //
        });
    }
}
