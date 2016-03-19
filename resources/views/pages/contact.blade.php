@extends('master')

@section('content')

  <h2>Contact us</h2>

  {!! Form::open(['url'=>'send-mail']) !!}
  <div class="row">
    <div class="col-md-4">
      {!! Form::label('from', 'From') !!}
      {!! Form::email('from', '', ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      {!! Form::label('subject', 'Subject') !!}
      {!! Form::text('subject', '', ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      {!! Form::label('message', 'Message') !!}
      {!! Form::textarea('message', '', ['class'=>'ckeditor']) !!}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      {!! Form::submit('Send', ['class'=>'btn btn-success form-control']) !!}
    </div>
  </div>
  {!! Form::close() !!}

@stop
