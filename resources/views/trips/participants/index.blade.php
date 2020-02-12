@extends('layouts.app')

@section('content')

{{-- <a href="{{route('trips.participants.search', $trip)}}">click me</a> --}}
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
<table class="table table-hover">
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
                <form action="{{ route('trips.participants.add', [$trip, $user]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">click me</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

{{-- Just list the current participants --}}
<div class="card">
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