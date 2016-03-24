@extends('master')

@section('content')

  <h2>{{ $ad->title }}</h2>
  {{ ($ad->approve == 0) ? 'Needs approval from admin.' : '' }}
  <div class="auth-info">
    @if(Auth::user()->id == $ad->user['id'] || Auth::user()->rank == 'admin')
      <div class="group-right pull-right">
        <div class="actions">
          {!! HTML::link('ad/'.$ad->id.'/edit', "Edit") !!}
          <span>/</span>
          {!! HTML::link('ad/'.$ad->id.'/delete', "Delete") !!}
        </div>
      </div>
    @endif
    <div class="group-left">
      <div class="username"><strong> {{ $ad->user['name'] }} </strong></div>
      <div class="created-at">{{ $ad->created_at->diffForHumans() }}</div>
    </div>
  </div>
  <hr>
  <div class="description">
    {!! $ad->description !!}
    <strong>Categories:</strong>
    <ul>
    @foreach($ad->categories as $category)
      <li>{!! HTML::link($category->slug, $category->name) !!}</li>
    @endforeach
    </ul>
  </div>
  <div class="media">
    @foreach($images as $image)
      @unless($image == null)
        <img src="/images/ads/{{ $ad->id }}/{{ $image }}" alt="">
      @endunless
    @endforeach
  </div>

@stop
