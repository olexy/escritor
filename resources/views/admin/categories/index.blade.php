@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center font-weight-bold">Categories</h2>
            <table class="table table-hover table-striped  table-dark">
                <thead class="thead-light">
                    <th>
                    Category name
                    </th>
                    <th>
                        Editing category
                    </th>
                    <th>
                        Deleting category
                    </th>
                </thead>       
                    
                <tbody>
                    @if($categories->count() > 0)
                         @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name}}
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-info">
                                    Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-sm btn-danger">
                                    Delete
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