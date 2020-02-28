@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Edit Trip
    </div>
    
    <form action="{{ route('trips.update', $trip) }}" method="POST" enctype="multipart/form-data">
        
        @csrf
       @method('PUT') 
        <label for="title">Trip title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$trip->title}}">
        <label for="description">Trip description</label>
        <input type="text" name="description" id="description" class="form-control" value="{{$trip->description}}">
        
        <label for="begin_date">Begin date</label>
        <input type="text" name="begin_date" id="begin_date" class="form-control" value="{{$trip->begin_date}}>
        
        
        <label for="end_date">End date</label>
        <input type="text" name="end_date" id="end_date" class="form-control" value="{{$trip->end_date}}>
        
        <div class="input-group-sm">
            <input type="radio" name="is_public" id="is_public"  value="1"> Public
            <input type="radio" name="is_public" id="is_public" value="0"> Private
        </div>
        <label for="cover">Trip cover</label>
        <input type="file" name="cover" id="cover">
        
        <button type="submit" class="btn btn-success my-2">Update</button> 
    </form>
    <button onclick="deleteHandle({{$trip->id}})" class="btn btn-danger btn-sm" role="button" >
        Delete Trip
    </button>
    <form action="{{ route('trips.destroy', $trip) }}" id="form-delete" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        @include('layouts.prompts')
    </form>
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

