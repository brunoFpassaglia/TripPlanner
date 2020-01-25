@extends('layouts.app')

@section('content')
<form action="{{route('users.update', $user)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset($user->avatar) }}" width="120px" height="90px" alt="">
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                       <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 my-2">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-control" name="bio" id="bio" value="{{ $user->bio }} ">
                        <div class="card-body">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection