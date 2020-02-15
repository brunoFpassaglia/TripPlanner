<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTripRequest;
use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('isTripOrganizer')->only('edit');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $trips = Trip::publicTrips()->get();
        return view('trips.index')->with('trips', $trips)->with('pagetitle', 'Public trips');
    }
    
    public function personal()
    {
        //
        $trips = auth()->user()->trips;
        return view('trips.index')->with('trips', $trips)->with('pagetitle', 'Personal trips');;
    }
    
    
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('trips.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateTripRequest $request)
    {
        //
        $data = $request->validated();
        // auth()->user()->ownsTrip()->create($data);
        $new_trip = auth()->user()->ownsTrip()->create($data);
        auth()->user()->trips()->attach($new_trip, ['is_organizer'=>true]);
        return redirect()->route('trips.show', $new_trip);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Trip  $trip
    * @return \Illuminate\Http\Response
    */
    public function show(Trip $trip)
    {
        //
        return view('trips.show')->with('trip', $trip);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Trip  $trip
    * @return \Illuminate\Http\Response
    */
    public function edit(Trip $trip)
    {
        //
        return "edit page";
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Trip  $trip
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Trip $trip)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Trip  $trip
    * @return \Illuminate\Http\Response
    */
    public function destroy(Trip $trip)
    {
        //
    }
    
    
    public function joinTrip(Trip $trip){
        
        auth()->user()->trips()->syncWithoutDetaching($trip);
        return redirect()->route('trips.show', $trip);
    }
    
    
    public function quitTrip(Trip $trip){
        
        auth()->user()->trips()->detach($trip);
        return redirect()->route('trips.show', $trip);
    }
}
