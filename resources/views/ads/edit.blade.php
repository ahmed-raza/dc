@extends('master')


@section('content')
  <h2>Post an Ad</h2>
  {!! Form::model($ad,['method'=>'PATCH', 'url'=>'ad/'.$ad->id]) !!}
  @include('ads.partials.form', ['submitButtonText'=>'Update Ad'])
  {!! Form::close() !!}
@stop
