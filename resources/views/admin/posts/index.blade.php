@extends('layouts.app')

@section('content')
    <div class="card">
            <h4 class="card-title font-weight-bold">All posts</h4>
            <table class="table table-hover table-striped  table-dark">
                <thead class="thead-light">
                    <th>
                        Image
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Tags
                    </th>
                    <th>
                        Blurb
                    </th>
                    <th>
                       Activity
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
                                    <a href="{{ route('category.edit', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                                </td>
                                <td>
                                    {{ $post->tags->count() }}
                                </td>
                                <td>
                                    {{ $post->description }}
                                </td>
                                <td>
                                    @if(!$post->trashed())
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                    @else
                                    <form action="{{ route('post.restore', ['id' => $post->id]) }}" method="POST">
                                    @csrf

                                    @method('PUT')
                                        <button class="btn btn-sm btn-success" type="submit">Restore</button>
                                    </form>
                                    
                                    @endif
                                    <hr>

                                    <form action=""  method="POST" id="deleteCategoryForm">
                                        @csrf
                                        @method('DELETE')  
                                        <button type="button" class="btn btn-sm btn-danger" onclick="handleDelete({{ $post->id }})">
                                         {{ $post->trashed() ? 'Delete': 'Trash'}}
                                        </button>
                                         <!-- Modal -->
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Trashing post</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center"> 
                                                        Are you sure you wan to trash this post?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
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
@section('script')
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteCategoryForm')
            form.action="{{ route('posts.destroy', '')}}/" + id
            $('#deleteModal').modal('show')
        }
    </script>

@endsection


@stop