@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header title">
            Create a new category       
        </div>
        <div class="card-body">
            <form action="{{ route('category.store')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="2" class="form-control"></textarea>
                </div>            
                <div class="form-group">
                   <div class="text-center">
                   <button class="btn btn-success" type="submit"> Store category </button>
                   </div>
                </div>
            
            </form>
        </div>
    </div>

@endsection