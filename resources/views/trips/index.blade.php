@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Browse trips
                </div>
                
                <div class="card my-3">
                    
                    @foreach ($trips as $trip)
                    <div class="card-header">
                        {{ $trip->title }}
                    </div>
                    <div class="card-body">
                        {{ $trip->description }}
                    </div>
                    @endforeach
                    
                </div>           
            </div>
        </div>
    </div>
</div>
@endsection