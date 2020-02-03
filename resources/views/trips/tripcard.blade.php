{{-- <div class="card border-dark flex-md-row mb-4 shadow-sm h-md-250" style="min-height: 18rem; min-width: 23em; max-width: 23rem;">
    <img class="card-img-top" src="{{ asset('/storage/taj.jpeg') }}" alt="" style="width:100%">
    <div class="card-body">
        <strong class="d-inline-block mb-2 text-dark">{{ $trip->title }}</strong>
        <div class="mb-1 text-muted small">{{ $trip->begin_date}} -- {{$trip->end_date}}</div>
        <p class="card-text mb-auto">{{ Str::limit($trip->description, 20) }}</p>
        <a class="btn btn-outline-dark btn-sm" role="button" href="{{ route('trips.show', $trip) }}">Check</a>
    </div>
</div> --}}

<div class="card border-dark mb-4 zoom" style="width:360px">
    <a href="{{asset(Auth::user()->avatar) }}" target="_blank">
        <img class="card-img-top" src="{{ asset($trip->cover) }}" alt="" style="width:100%">
    </a>
    <div class="card-body">
        <strong class="d-inline-block mb-2 text-dark">{{ Str::limit($trip->title, 20) }}</strong>
        <div class="mb-1 text-muted small">{{ $trip->begin_date}} until {{$trip->end_date}}</div>
        <p class="card-text mb-auto">{{ Str::limit($trip->description, 60) }}</p>
        <a class="btn btn-outline-dark btn-sm" role="button" href="{{ route('trips.show', $trip) }}">Check Trip</a>
    </div>
</div>