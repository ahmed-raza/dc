@extends('layouts.app')

@section('content')

  <div class="container">
    <h2>{{ $user->name }}'s Ads</h2>
    @foreach($user->ads as $ad)
      @unless($ad->approve == 0 && Auth::guest())
        <article>
          <div class="title">
            <h2>{!! HTML::link('ad/'.$ad->id, $ad->title) !!}</h2>{{ ($ad->approve == 0) ? 'Needs approval from admin.' : '' }}
          </div>
          <hr>
        </article>
      @endunless
    @endforeach
  </div>

@stop
