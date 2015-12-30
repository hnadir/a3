@extends('app')
 
@section('content')
    <h2>Users</h2>
 
    @if ( !$user->count() )
        No users to display
    @else
        <ul>
            @foreach( $user as $user )
                <li>
					{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.destroy', $user->id))) !!}
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}&nbsp|&nbsp{{$user->role}} user</a>
                        (
                            {!! link_to_route('users.edit', 'Edit User Info', array($user->id), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Delete User', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
				</li>
            @endforeach
        </ul>
    @endif
<p>
        {!! link_to_route('users.create', 'Create User') !!}
    </p>
@endsection