@extends('master')

@section('content')

  <h2>Daily Classifieds</h2>
  @foreach($ads as $ad)
    @unless($ad->approve == 0)
      <div class="col-md-4">
      @if($ad->images)
        <div class="group-header">
          <div class="image"><img src="/images/ads/{{ $ad->id }}/{{ explode(',', $ad->images)[0] }}" alt="" width="320" height="200"></div>
        </div>
      @endif
        <div class="group-body">
          <h3>{{ HTML::link(route('ad.show', $ad->slug), $ad->title) }}</h3>
        </div>
      </div>
    @endunless

  @endforeach
@stop
