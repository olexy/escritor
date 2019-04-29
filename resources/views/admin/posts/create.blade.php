@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header title">
            {{isset($post) ? 'Edit Post': 'Create Post'}}       
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('post.update', ['id' => $post->id]) : route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if(isset($post))
                
                @method('PUT')

                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ isset($post) ? $post->title: ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id"> 
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @if(isset($post))
                        @if($post->category->id == $category->id)
                                selected
                        @endif 
                    @endif                      
                    >{{ $category->name }}
                    </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ isset($post) ? $post->description: ''}} </textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content: ''}}" class="trix-content">
                    <trix-editor input="content"></trix-editor>
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
                @if($tag->count() > 0)
                    <label for="tags">Select Tags</label>
                    <br>
                    <select class="form-control tags-selector" multiple="multiple" name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                            @if(isset($post))
                                 @if($post->hasTag($tag->id))
                                    selected
                                 @endif
                            @endif
                            >{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                @endif
                </div>
                <div class="form-group">
                    <label for="image_link">Featured Image</label>
                    <input type="file" name="image_link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at: ''}}" class="form-control">
                </div>
                @if(isset($post)) 
                <div class="form-group">
                    <img src="{{ asset($post->image_link)}}" alt="$post->title" style="width: 50%">
                </div>
                @endif
                             
                <div class="form-group">
                   <div class="text-center">
                   <button class="btn btn-success" type="submit">  {{isset($post) ? 'Edit Post': 'Create Post'}} </button>
                   </div>
                </div>
            
            </form>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    flatpickr("#published_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i"
    });

    
    $(".tags-selector").select2({
    tags: true
    });
</script>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection