@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header title">
            Create a new post        
        </div>
        <div class="card-body">
            <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
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
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple class="form-control" name="tags[]" id="tags">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>  
                    @endforeach          
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    <br>
                    @foreach($tags as $tag)
                          <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label>           
                    @endforeach 
                </div>
                <div class="form-group">
                    <label for="image_link">Featured Image</label>
                    <input type="file" name="image_link" class="form-control">
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