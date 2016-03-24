@extends('master')

@section('content')

  <h2>Delete: {{ $ad->title }}</h2>
  <p>Are you sure you want to delete ad '<em>{{ $ad->title }}</em>'? It cannot be recovered.</p>
  {!! Form::open(['route'=>['ad.destroy', $ad->id], 'method'=>"DELETE"]) !!}
  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
  {!! HTML::link('ad/'.$ad->id, 'Cancel', ['class'=>'btn btn-warning']) !!}
  {!! Form::close() !!}

@stop
