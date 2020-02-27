@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8"> 
        <img src="{{ isset($user->avatar) ? '/storage/'.$user->avatar : asset('/storage/avatars/default.png')}}" class="img-fluid float-left" alt="" srcset="" width="500" height="500"> 
    </div> 
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>
                    {{ $user->name }}
                </h5>
                @if (Auth()->user()->id == $user->id)
                <a href="{{ route('edit_profile', $user) }}" style="color: grey;"><i class="fas fa-edit"></i></a>
                @endif
            </div>
            <div class="card-body">
                <p>
                    {{$user->bio }}
                </p>
                <p>
                    <i class="fas fa-suitcase" title="Number of trips this user has joined"></i>
                    {{$user->trips->count()}}
                    <i class="fas fa-clipboard-list" title="Number of trips this user created"></i>
                    {{$user->ownsTrip->count()}}
                </p>
                <p class="card-text"><small class="text-muted font-italic">{{ $user->email }}</small> </p>
                <p class="card-text"><small class="text-muted">Member since {{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</small></p>
            </div>
        </div>
    </div>
</div>
@endsection