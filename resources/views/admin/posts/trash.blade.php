@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body"> 
            <h2 class="card-title text-center font-weight-bold">Trashed posts</h2>
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
                        Restore
                    </th>
                    <th>
                        Destroy
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
                                    {{ $post->description }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-success">
                                        Restore
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">
                                        Destroy
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