@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header title">
            Create a new post        
        </div>
        <div class="card-body">
            <form action="/post/store" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image_link">Featured Image</label>
                    <input type="file" name="image_link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">Select a category </select>
                </div>
                <div class="form-group">
                   <div class="text-center">
                   <button class="btn btn-success" type="submit"> Create post </button>
                   </div>
                </div>
            
            </form>
        </div>
    </div>

@endsection