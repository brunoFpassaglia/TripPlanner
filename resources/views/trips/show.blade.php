@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $trip->title}}
    </div>
    <div class="card-body">
        {{ $trip->description }}
    </div>
</div>
<div class="card my-2 mx-2">
    @foreach ($trip->posts as $post)
    <div class="card-header">
        {{ $post->title }}
    </div>
    <div class="card-body">
        {{ $post->content }}
        @foreach ($post->comments as $comment)
        <div class="card-body">{{ $comment->content }}</div>
        @endforeach
        <form action="{{ route('comments.store', ['trip'=>$trip, 'post'=>$post]) }}" method="post">
            @csrf
            <textarea name="content" id="content" class="form-control" cols="30" rows="5" placeholder="Comment about it"></textarea>
            <button type="submit" class="btn btn-secondary">Comment</button>
        </form>
    </div>
    
    @endforeach
</div>
<div class="card my-3">
    <div class="card-body">
        <form action="{{ route('posts.store', $trip) }}" method="POST">
            @csrf
            <input type="text" id="title" name="title" class="form-control" placeholder="Post title">
            <textarea name="content" id="content" class="form-control" cols="30" rows="5" placeholder="Post about it"></textarea>
            <button type="submit" class="btn btn-secondary">Post</button>
        </form>
    </div>
</div>



@endsection