@extends('app')
 
@section('content')
    <h2>View/Edit code "{{ $code->id }}"</h2>
 
    {!! Form::model($code, ['method' => 'PATCH', 'route' => ['users.codes.update', $user->id, $code->id]]) !!}
        @include('codes/partials/_form', ['submit_text' => 'Show Results'])
    {!! Form::close() !!}
@endsection