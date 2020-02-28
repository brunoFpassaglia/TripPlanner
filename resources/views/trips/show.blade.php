@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title">
			{{ $trip->title}}
		</h5>
	</div>
	
	<div class="card-body">
		<p>
			<div class="mb-1">{{$trip->description}}</div>
			<br>
			<div class="mb-1 text-muted small">{{$trip->begin_date}}</div>
			<div class="mb-1 text-muted small">{{$trip->end_date}}</div>
		</p>
		<a href="/storage/{{$trip->cover}}" target="_blank">
			<img class="card-img-top" src="/storage/{{$trip->cover}}" alt="" style="width:100%">
		</a>
	</div>
</div>
@if ((Auth::user()->trips->contains($trip))) {{-- if user joined the trip, show trips posts, else button to join--}}
<p>
	<h2 class="my-3">Posts</h2>
</p>
@foreach ($trip->posts as $post)
<div class="my-3 ">
	<div class="card border-info shadow-sm">
		<div class="card-header">
			<div class="row no-gutters">
				<div class="col-md-1">
					<div class="avatar">
						<img src="{{ isset($post->user->avatar) ? '/storage/'.$post->user->avatar : asset('/storage/avatars/default.png')}}" alt="" style="width:50px; height:50px">
					</div>
				</div>
				{{ $post->title }}
			</div>
		</div>
		<div class="card-body">
			<div class="trix-content">
				{!! $post->content !!}
			</div>
			<div class="blockquote-footer">
				{{$post->user->name}}, {{$post->created_at}}
			</div>
		</div>
		<div class="card-footer-custom">
			<h6 class="mx-2">Comments</h6>
			@foreach ($post->comments as $comment)
			<div class="card my-2 shadow-sm">
				<div class="row no-gutters">
					<div class="card-header-custom border-black">
						<div class="col-md-1">
							<div class="avatar">
								<img src="{{ isset($comment->user->avatar) ? '/storage/'.$comment->user->avatar : asset('/storage/avatars/default.png')}}" alt="" style="width:50px; height:50px">
							</div>
						</div>
					</div>
					<div class="card-body">
						{{ $comment->content }}
						<div class="blockquote-footer">
							{{$comment->user->name}}, {{$comment->created_at}}
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<form action="{{ route('trips.posts.comments.store', [$post->trip, $post]) }}" method="POST" class="">
				@csrf
				<input type="text" name="content" id="content" class="form-control">
				<button type="submit" class="btn btn-secondary">Add comment</button>
			</form>
		</div>
	</div>
</div>
@endforeach
<div class="card my-3">
	<div class="card-body">
		<form action="{{ route('trips.posts.store', $trip) }}" method="POST">
			@csrf
			<input type="text" id="title" name="title" class="form-control" placeholder="Post title">
			<br>
			<input id="post_content" value="" type="hidden" name="content">
			<trix-editor input="post_content"></trix-editor>
			<button type="submit" class="btn btn-secondary">Post</button>
		</form>
	</div>
</div>
<div class="d-flex flex-row-reverse">
	<form action="{{ route('trips.quittrip', $trip) }}" method="POST">
		@csrf
		<button class="btn btn-danger" type="submit" class="form-group">Quit this trip</button>
	</form>
	<a href="{{route('trips.participants.index', $trip) }}" class="btn btn-secondary">Check participants</a>
	<a href="{{ route('trips.edit', $trip) }}" class="btn btn-secondary">Edit trip details</a>
</div>
@else
<div class="d-flex flex-row-reverse my-3">
	<form action="{{ route('trips.jointrip', $trip) }}" method="POST">
		@csrf
		<button class="btn btn-primary" type="submit">Join this trip</button>
	</form>
</div>
@endif

@endsection

@section('scripts')
@trixassets
@endsection