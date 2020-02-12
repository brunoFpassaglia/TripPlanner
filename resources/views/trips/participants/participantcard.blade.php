<div class="card border-dark mb-4 zoom" style="width:360px">
    <a href="{{ asset($participant->avatar) }}" target="_blank">
        <img class="card-img-top" src="{{ isset($participant->avatar) ? asset($participant->avatar) : asset('/storage/avatars/default.png')}}" alt="" style="width:100%">
    </a>
    <div class="card-body">
        <strong class="d-inline-block mb-2 text-dark">{{ $participant->name }}</strong>
        <a class="btn btn-outline-dark btn-sm" role="button" href="{{ route('profile', $participant) }}">See Profile</a>
    </div>
</div>