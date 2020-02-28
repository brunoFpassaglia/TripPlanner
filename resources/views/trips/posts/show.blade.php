@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header shadow-sm">
        <h5 class="card-title">
            {{ $post->title}}
        </h5>
    </div>
    
    <div class="card-body">
        {!! $post->content !!}
    </div>
    
    @foreach ($post->comments as $comment)
    <div class="card">
        <div class="card-header">
            {{$comment->content}}
        </div>
    </div>
    @endforeach
    
</div>
<form action="{{ route('trips.posts.comments.store', [$post->trip, $post]) }}" method="POST" class="my-3">
    @csrf
    <input type="text" name="content" id="content" class="form-control">
    <button type="submit" class="btn btn-secondary">Add comment</button>
</form>

@endsection

@section('scripts')
@endsection