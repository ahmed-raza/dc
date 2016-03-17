@extends('layouts.app')


@section('content')

  <div class="container">
    <h2>{{ Auth::user()->name }}</h2>
  </div>

@stop
