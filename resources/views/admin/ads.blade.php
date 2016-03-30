@extends('master')

@section('content')

  <h2>All Ads</h2>

  <div class="search-ads">
    {!! Form::open(['url'=>'admin/all-ads', 'method'=>'POST']) !!}
      @include('admin.partials.search-form')
    {!! Form::close() !!}
  </div>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Ad Title</th>
        <th>Author</th>
        <th>Status</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ads as $key => $ad)
        <tr class="{{ ($ad->approve == 1) ? 'success' : 'danger' }}">
          <td>{{ $key + 1 }}</td>
          <td>{{ HTML::link('ad/'.$ad->slug, $ad->title) }}</td>
          <td>{{ $ad->user['name'] }}</td>
          <td>{{ ($ad->approve == 1) ? 'Approved' : 'Not approved' }}</td>
          <td>{{ $ad->created_at->format('Y-M-d | m:i a') }}</td>
          <td>{{ HTML::link('ad/'.$ad->id.'/edit', 'Edit') }} {{ HTML::link('ad/'.$ad->id.'/delete', 'Delete') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {!! $ads->render() !!}
  </div>

@stop
