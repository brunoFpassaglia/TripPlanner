@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <img src="{{ asset($user->avatar) }}" width="120px" height="90px" alt="">
        {{ $user->name }}
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{$user->bio }}
        <div class="card-body">
        </div>
    </div>
</div>
<div class="card">
    my trips
</div>
@foreach ($user->trips as $trip)
{{$trip->title}}
<br>
@endforeach
@endsection