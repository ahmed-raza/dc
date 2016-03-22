@extends('master')

@section('content')

  <h2>{{ $ad->title }}</h2>
  {{ ($ad->approve == 0) ? 'Needs approval from admin.' : '' }}
  <div class="auth-info">
    <div class="group-right pull-right">
      <div class="actions">
        <a href="#">Edit</a>
        <span>/</span>
        <a href="#">Delete</a>
      </div>
    </div>
    <div class="group-left">
      <div class="username"> {{ $ad->user['name'] }} </div>
      <div class="created-at">{{ $ad->created_at->diffForHumans() }}</div>
    </div>
  </div>
  <hr>
  <div class="description">
    {!! $ad->description !!}
    @foreach($ad->categories as $category)
      <span>{!! HTML::link('tags/'.$category->id, $category->name) !!},</span>
    @endforeach
  </div>

@stop
