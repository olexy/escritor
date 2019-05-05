@extends('layouts.portal')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
<div class="section-row">
    <h3> {{$post->title}}  </h3>
    <li><a href="author.html">{{$post->user->name}}</a></li>
    {{ $post->description }}
    <figure class="pull-right">
        <img src="{{ $post->image_link }}" alt="" height="200" style="250">
        <figcaption>Lorem ipsum dolor sit amet, mea ad idque detraxit,</figcaption>
    </figure>
    <p> {{  $post->content }}
</div>
    <!-- /post content -->

    <!-- post tags -->
    <div class="section-row">
    <div class="post-tags">
        <ul>
            <li>TAGS:</li>
            @foreach($post->tags as $tags)
            <li><a href="#">{{ $tags->tag }}</a></li>
            @endforeach
        </ul>
    </div>
    </div>
@endsection