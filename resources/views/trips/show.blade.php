@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            <div class="">
				{{ $trip->title}}
				<a href="{{ route('trips.edit', $trip) }}" class="btn btn-secondary btn-sm justify-content-end">Edit trip details</a>
			</div>
            <a href="{{ asset($trip->cover) }}" target="_blank">
                <img class="card-img-top" src="{{ asset($trip->cover) }}" alt="" style="width:100%">
            </a>
        </h5>
    </div>
    
    <div class="card-body">
        @if ((Auth::user()->trips->contains($trip))) {{-- if user joined the trip, show trips posts, else button to join--}}
			@foreach ($trip->posts as $post)
			<div class="card my-2">
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
			</div>
			@endforeach
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
			<form action="{{ route('trips.quittrip', $trip) }}" method="POST">
				@csrf
				<button class="btn btn-danger" type="submit">Quit this trip</button>
			</form>
			
			<a href="{{route('trips.participants.index', $trip) }}" class="btn btn-secondary">Check participants</a>
        @else
			<form action="{{ route('trips.jointrip', $trip) }}" method="POST">
				@csrf
				<button class="btn btn-primary" type="submit">Join this trip</button>
			</form>
        @endif
    </div>
</div>




@endsection

@section('scripts')
@trixassets
@endsection