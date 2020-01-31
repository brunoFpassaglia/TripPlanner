@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $pagetitle ?? 'Trips'}}
    </div>
    <div class="card-deck my-3">
        @foreach ($trips->chunk(2) as $chunk)
                @foreach ($chunk as $trip)
                    <div class="col-md-6">
                        @include('trips.tripcard')
                    </div>
                @endforeach
        @endforeach
    </div>
</div>
<a href="{{ route('trips.create') }}" class="btn btn-secondary my-2">Add trip</a>
@endsection