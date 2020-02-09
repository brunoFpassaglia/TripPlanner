@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $pagetitle ?? 'Participants'}}
    </div>
    <div class="card-deck my-3">
        @foreach ($participants as $participant)
                    <div class="col-md-6">
                        @include('trips.participants.participantcard')
                        {{-- {{ $participant->name }} --}}
                    </div>
        @endforeach
    </div>
</div>
 
@endsection