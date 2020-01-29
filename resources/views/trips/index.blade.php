@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">
                Browse trips
            </div>
            
            <div class="card my-3">
                
                @foreach ($trips as $trip)
                <div class="card-header">
                    {{ $trip->title }}
                    <a href="{{ route('trips.show', $trip) }}"> Show trip</a>
                </div>
                <div class="card-body">
                    {{ $trip->description }}
                </div>
                @endforeach
                
            </div>           
        </div>
        <a href="{{ route('trips.create') }}" class="btn btn-secondary my-2">Add trip</a>
@endsection