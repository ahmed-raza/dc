@extends('master')

@section('content')

  <h2>{{ $ad->title }}</h2>
  <span>By:</span>
  <em>{{ $ad->user->name }}</em>
  <br>
  <span>On:</span>
  <em>{{ $ad->created_at }}</em>
  <div class="description">
    {{ $ad->description }}
  </div>

@stop
