<!-- /resources/views/projects/edit.blade.php -->
@extends('app')
 
@section('content')
    <h2>Edit User</h2>
 
    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
        @include('users/partials/_form', ['submit_text' => 'Edit User'])
    {!! Form::close() !!}
@endsection