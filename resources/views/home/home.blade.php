@extends('master')

@section('content')

  <h2>Daily Classifieds</h2>
  @if(Carbon\Carbon::now()->format('m-d') < Carbon\Carbon::createFromDate(1, 18)->format('m-d'))
  <span>Your birthday is gone!</span>
  @endif
@stop
