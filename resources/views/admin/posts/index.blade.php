@extends('layouts.app')

@section('content')
    <div class="card">
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
                        Blurb
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
                                    <img src="{{ asset($post->image_link) }}" alt="{{ $post->title }}" height="75px" width="80px">
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->description }}
                                </td>
                                <td>
                                    @if(!$post->trashed())
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                    @else
                                    <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-success">
                                        Restore
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')  
                                        <button type="submit" class="btn btn-sm btn-danger">
                                         {{ $post->trashed() ? 'Delete': 'Trash'}}
                                        </button>
                                    </form>        
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

@stop