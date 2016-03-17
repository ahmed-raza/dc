<div class="row">
  <div class="col-md-4">
    {!! Form::label('Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    {!! Form::label('Category') !!}
    {!! Form::text('category', null, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    {!! Form::label('City') !!}
    {!! Form::text('city', null, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    {!! Form::label('Description') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-success form-control']) !!}
  </div>
</div>
