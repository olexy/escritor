@extends('layouts.app')

@section('content')
    <div class="card">
            <h4 class="card-title font-weight-bold">All users</h4>
            <table class="table table-hover table-striped  table-dark">
                <thead class="thead-light">
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Bio
                    </th>
                    <th width="10%">
                       Activity
                    </th>
                </thead>       
                    
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ Gravatar::src($user->email) }}" alt="" height="40px" width="40px" style="border-radius:50%">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->about }}
                                </td>
                                <td>
                                @if(!$user->isAdmin())
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-success" type="submit">Make Admin</button>
                                    </form>
                                @elseif(!$user->isSuperAdmin() || !auth()->user())
                                     <form action="{{ route('users.revoke-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Revoke Admin</button>
                                    </form> 
                                @endif
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

@endsection


@stop