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
                    <option value="{{ $category->id }}"
                        @if($post->category->id == $category->id)
                            selected
                        @endif                      
                    > {{ $category->name }}
                    </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    <br>
                    @foreach($tags as $tag)
                          <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            @foreach($post->tags as $t)
                                @if($tag->id == $t->id)
                                    checked
                                @endif
                            @endforeach
                          > {{ $tag->tag }}</label>           
                    @endforeach 
                </div>
                <div class="form-group">
                    <label for="image_link">Featured Image</label>
                    <input type="file" name="image_link" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" class="form-control">
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