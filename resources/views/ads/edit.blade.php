@extends('master')


@section('content')
  <h2>Post an Ad</h2>
  {!! Form::model($ad,['method'=>'PATCH', 'url'=>'ad/'.$ad->id, 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
  @include('ads.partials.form', ['submitButtonText'=>'Update Ad', 'adImages'=>$adImages])
  <div class="row">
    <div class="col-md-12">
      {!! HTML::link("ad/".$ad->id, 'Cancel' ,['class'=>'btn btn-warning form-control']) !!}
    </div>
  </div>
  {!! Form::close() !!}
@stop
