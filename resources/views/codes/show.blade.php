@extends('app')
 
@section('content')
    <h2>
        {!! link_to_route('users.show', $user->name, [$user->id]) !!} -
        {{ $code->id }}
    </h2>
 
    {{ $code->code }}
@endsection