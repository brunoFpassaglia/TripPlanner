<div class="card border-dark mb-4 zoom" style="width:360px;">
    <a href="{{ asset($trip->cover) }}" target="_blank">
        <img class="card-img-top" src="{{ isset($trip->cover) ? asset($trip->cover) : asset('/storage/tripcovers/imageNotAvailable.png')}}" alt="" style="width:100%">
    </a>
    <div class="card-body">
        <strong class="d-inline-block mb-2 text-dark">{{ Str::limit($trip->title, 20) }}</strong>
        <div class="mb-1 text-muted small">{{ Carbon\Carbon::parse($trip->begin_date)->format('d-m-Y i') }} until {{ Carbon\Carbon::parse($trip->end_date)->format('d-m-Y i') }}</div>
        <p class="card-text mb-auto">{{ Str::limit($trip->description, 60) }}</p>
        <a class="btn btn-outline-dark btn-sm" role="button" href="{{ route('trips.show', $trip) }}">Check Trip</a>
    </div>
</div>