@extends('master')

@section('content')

  <h2>{{ $ad->title }}</h2>
  {{ ($ad->approve == 0) ? 'Needs approval from admin.' : '' }}
  {!! Form::open(['url'=>'ad/'.$ad->id, 'method'=>'DELETE']) !!}
  {!! Form::hidden('id', $ad->id); !!}
  {!! Form::submit('delete', ['class'=>'btn btn-success']) !!}
  {!! Form::close() !!}
  <span>By:</span>
  <em>{{ $ad->user->name }}</em>
  <br>
  <span>On:</span>
  <em>{{ $ad->created_at }}</em>
  <div class="description">
    {!! $ad->description !!}
    @foreach($ad->categories as $category)
      <span>{!! HTML::link('tags/'.$category->id, $category->name) !!},</span>
    @endforeach
  </div>

@stop
