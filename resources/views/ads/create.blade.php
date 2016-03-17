@extends('master')


@section('content')
  <h2>Post an Ad</h2>
  {!! Form::open(['route'=>'ad.store', 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
  @include('ads.partials.form', ['submitButtonText'=>'Post Ad'])
  {!! Form::close() !!}
@stop
