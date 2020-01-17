@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $trip->title}}
                </div>
                <div class="card-body">
                    {{ $trip->description }}
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <form action="{{ route('posts.create', $trip) }}">
                        @csrf
                        <textarea name="post" id="post" class="form-control" cols="30" rows="5">Post about...</textarea>
                        <button type="submit" class="btn btn-secondary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection