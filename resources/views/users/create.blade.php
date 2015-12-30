@extends('app')
 
@section('content')
    <h2>Create User</h2>
 
    {!! Form::model(new App\User, ['route' => ['users.store']]) !!}
        @include('users/partials/_form', ['submit_text' => 'Create User'])
    {!! Form::close() !!}
@endsection
 
