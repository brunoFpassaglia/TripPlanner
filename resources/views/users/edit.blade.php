@extends('layouts.app')

@section('content')
<form action="{{route('users.update', $user)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <img src="{{ asset($user->avatar) }}" width="120px" height="90px" alt="">
                   <label for="avatar">Avatar</label>
                   <input type="file" class="form-control" name="avatar" id="avatar">
                    <input type="text" class="form-control my-2" name="name" id="name" value="{{ $user->name }}"> 
                    <input type="text" class="form-control" name="bio" id="bio" value="{{ $user->bio }} ">
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection