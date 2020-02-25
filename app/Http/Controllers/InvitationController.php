<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\Notifications\TripInvitation;
use App\Trip;
use App\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Dumper\IniFileDumper;

class InvitationController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $invitations = auth()->user()->invitations;
        return view('invitations.index', ['invitations'=>$invitations, 'pagetitle'=> 'Invitations']);
    }
    
    public function accept(Invitation $invitation){
        
        $invitation->accepted = true;
        $invitation->save();
        // return redirect()->action('TripController@joinTrip', $invitation->id);
        $trip = Trip::find($invitation->trip_id);
        auth()->user()->trips()->syncWithoutDetaching($trip);
        return redirect()->route('trips.show', $trip);
    }
    
    public function reject(Invitation $invitation){
        $invitation->accepted = false;
        $invitation->save();
        return redirect()->back();
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function add(Trip $trip, User $user)
    {
        if(Invitation::where([['trip_id', '=', $trip->id], ['user_id', '=', $user->id]])->count() == 0){
            Invitation::create(['trip_id'=>$trip->id, 'user_id'=>$user->id]);
            $user->notify(new TripInvitation($trip));
            session()->flash('success', $user->name.' has been invited to your trip.');
            return redirect()->back();
        }
        else{
            session()->flash('warnings', 'User has already been invited.');
            return redirect()->back();
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Invitation  $invitation
    * @return \Illuminate\Http\Response
    */
    public function show(Invitation $invitation)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Invitation  $invitation
    * @return \Illuminate\Http\Response
    */
    public function edit(Invitation $invitation)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Invitation  $invitation
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Invitation  $invitation
    * @return \Illuminate\Http\Response
    */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
