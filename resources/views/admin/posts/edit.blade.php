@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header title">
            Edit post: <b> {{ $post->title }} </b>       
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id"> 
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}
                    </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image_link">Featured Image</label>
                    <input type="file" name="image_link" class="form-control">
                </div>                
                <div class="form-group">
                   <div class="text-center">
                   <button class="btn btn-success" type="submit"> Edit post </button>
                   </div>
                </div>
            
            </form>
        </div>
    </div>

@endsection