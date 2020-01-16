@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create new trip
                </div>
                
                <form action="{{ route('trips.store') }}" method="POST">

                    @csrf

                    <label for="title">Trip title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="description">Trip description</label>
                    <input type="text" name="description" id="description" class="form-control">


                    
                    <label for="begin_date">Begin date</label>
                    <input type="text" name="begin_date" id="begin_date" class="form-control">


                    <label for="end_date">End date</label>
                    <input type="text" name="end_date" id="end_date" class="form-control">
                    <button type="submit" class="btn btn-success my-2">Create</button> 
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#begin_date", {});
    flatpickr("#end_date", {});
</script>

@endsection

