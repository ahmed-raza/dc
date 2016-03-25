@extends('master')

@section('content')

  <h2>Daily Classifieds</h2>
  @foreach($ads as $ad)

    <div class="col-md-4">
      <div class="group-header">
        <div class="image"><img src="/images/ads/{{ $ad->id }}/{{ explode(',', $ad->images)[0] }}" alt="" width="320" height="200"></div>
      </div>
    </div>

  @endforeach
@stop
