@extends('layouts.app')

@section('content')

  <div class="container">
    <h2>{{ $user->name }}'s Ads</h2>
    @foreach($user->ads as $ad)
      <article>
        <div class="title">
          <h2>{!! HTML::link('ad/'.$ad->id, $ad->title) !!}</h2>
        </div>
      </article>
    @endforeach
  </div>

@stop
