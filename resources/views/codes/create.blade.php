@extends('app')
 
@section('content')
    <h2>Create code for user "{{ $user->name }}"</h2>
 
    {!! Form::model(new App\code, ['route' => ['users.codes.store', $user->id], 'class'=>'']) !!}
        @include('codes/partials/_form', ['submit_text' => 'Create code'])
    {!! Form::close() !!}
@endsection