<div class="card border-dark mb-4">
    <div class="card-header">
        someone invited you for a private trip.
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            
            <div class="flex-grow-1">
                <a href="{{ route('trips.show', $invitation->trip_id) }}" class="btn btn-outline-secondary btn-sm ">Show trip</a>
            </div>
            @if (!isset($invitation->accepted))
                <form action="{{ route('invitation.accept', $invitation) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-success btn-sm">Accept</button>
                </form>
                <form action="{{ route('invitation.reject', $invitation) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                </form>
            @else
                @if ($invitation->accepted == 1)
                    <i class="fa-check-square fas my-2" style="color:green;"></i>
                @else
                    <i class="fas fa-times my-2" style="color:red;"></i>
                @endif
            @endif
        </div>
    </div>
</div>