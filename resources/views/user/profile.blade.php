@extends('master')


@section('content')

  <div class="container">
    <h2>{{ $user->name }}</h2>
    <p> {{ $user->rank }} </p>
  </div>

@stop
