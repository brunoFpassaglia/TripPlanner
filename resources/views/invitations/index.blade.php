@extends('layouts.app')

@section('content')
<h1> here are the invitations!</h1>
<div class="card">
    <div class="card-header">
        {{ $pagetitle ?? 'Trips'}}
    </div>
    <div class="card-deck my-3">
        @foreach ($invitations as $invitation)
        <div class="col-md-12">
            @include('invitations.invitationcard')
        </div>
        @endforeach
    </div>
</div>
@endsection