@extends('layouts.app')

@section('content')

{{-- search for user form --}}
<form action="{{route('trips.participants.index', $trip)}}" method="GET">
    <div class="row">
        <div class="col-md-10">
            <input type="search" name="name" id="name" class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-info">search</button>
        </div>
    </div>
</form>

{{-- Lists search result, to invite other users to trip --}}
@if (isset($search_result))
<table class="table table-hover my-2">
    <thead>
        <th>name</th>
        <th>E-mail</th>
    </thead>
    <tbody>
        @foreach ($search_result as $user)
        <tr>
            {{-- <img class="card-img-top" src="{{ asset($user->avatar) }}" alt="" style="width:100%"> --}}
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="{{ $trip->is_public ? route('trips.participants.add', [$trip, $user]) : route('trips.invitations.add', [$trip, $user]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">Add</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

{{-- Just list the current participants --}}
<div class="card my-3">
    <div class="card-header">
        {{ $pagetitle ?? 'Participants'}}
    </div>
    <div class="card-deck my-3">
        @foreach ($participants as $participant)
        <div class="col-md-6">
            @include('trips.participants.participantcard')
        </div>
        @endforeach
    </div>
</div>

@endsection