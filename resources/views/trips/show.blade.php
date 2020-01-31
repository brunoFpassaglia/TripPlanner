@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            {{ $trip->title}}
        </h5>
        {{ $trip->description }}
    </div>

    <div class="card-body">
        <div class="card">
            @foreach ($trip->posts as $post)
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                <div class="trix-content">
                    {!! $post->content !!}
                </div>
                @foreach ($post->comments as $comment)
                <div class="card-body">{{ $comment->content }}</div>
                @endforeach
                {{-- <form action="{{ route('comments.store', ['trip'=>$trip, 'post'=>$post]) }}" method="post">
                    @csrf
                    <textarea name="content" id="content" class="form-control" cols="30" rows="5" placeholder="Comment about it"></textarea>
                    <button type="submit" class="btn btn-secondary">Comment</button>
                </form> --}}
            </div>
            
            @endforeach
        </div>
    </div>
</div>



<div class="card my-3">
    <div class="card-body">
        <form action="{{ route('trips.posts.store', $trip) }}" method="POST">
            @csrf
            <input type="text" id="title" name="title" class="form-control" placeholder="Post title">
            <br>
            {{-- @trix(\App\Post::class, 'content', [ 'hideTools' => ['text-tools'] ])  --}}
            <input id="content" value="" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
            <button type="submit" class="btn btn-secondary">Post</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@trixassets
@endsection