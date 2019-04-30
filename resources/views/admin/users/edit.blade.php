@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
 
    <div class="card">
        <div class="card-header title">
            Update My Profile: {{ $user->name }}        
        </div>
        <div class="card-body">
            <form action="{{ route('users.update-profile') }}" method="POST">
                {{ csrf_field() }}

                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">My Bio</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control"> {{ $user->about }} </textarea>
                </div>            
                <div class="form-group">
                   <div class="text-center">
                   <button class="btn btn-success" type="submit"> Update Profile </button>
                   </div>
                </div>
            
            </form>
        </div>
    </div>

@endsection