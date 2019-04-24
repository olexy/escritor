@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body"> 
            <h2 class="card-title font-weight-bold">All posts</h2>
            <table class="table table-hover table-striped  table-dark">
                <thead class="thead-light">
                    <th>
                        Image
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Trash
                    </th>
                </thead>       
                    
                <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src=" {{ $post->image_link }}" alt="{{ $post->title }}" height="75px" width="80px">
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->content }}
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">
                                        Trash
                                    </a>
                                </td>
                            </tr>                
                        @endforeach

                    @else
                        <tr>
                        <th colspan="5" class="text-center" > None at this time</th>
                        </tr>
                    @endif                 
                </tbody>
            </table>
        </div>
    </div>

@stop