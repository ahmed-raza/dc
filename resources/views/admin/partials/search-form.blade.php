<div class="row">
  <div class="col-md-4 title">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', '', ['placeholder'=>'Search by title...', 'class'=>'form-control']) !!}
  </div>
  <div class="col-md-1">
    {!! Form::label('approve', 'Approve') !!}
    {!! Form::select('approve', [0=>'No', 1=>'Yes'], 1, ['class'=>'form-control']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    {!! Form::submit('Search', ['class'=>'btn btn-success']) !!}
    {!! HTML::link(route('ads'), 'Clear Search', ['class'=>'btn btn-warning']) !!}
  </div>
</div>
