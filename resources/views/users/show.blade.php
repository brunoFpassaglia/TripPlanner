@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <img src="{{ asset($user->avatar) }}" width="120px" height="90px" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $user->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection