@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset($user->avatar) }}" width="120px" height="90px" alt="">
                    {{ $user->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 my-2">
            <div class="card">
                <div class="card-header">
                    {{$user->bio }}
                <div class="card-body">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 my-4">
            <div class="card">
                my trips
            </div>
            @foreach ($user->trips as $trip)
                {{$trip->title}}
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection