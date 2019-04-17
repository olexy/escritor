@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
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
                        Delete
                    </th>
                </thead>       
                    
                <tbody>
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
                            Edit
                            </a>
                        </td>

                        <td>
                            Delete 
                            </a>
                        </td>
                    </tr>
                
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@stop