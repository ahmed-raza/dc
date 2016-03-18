<div class="row">
  <div class="col-md-4">
    {!! Form::label('Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category_list[]', $categories, null, ['class'=>'form-control', 'id'=>'tag_list', 'multiple']) !!}
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
    {!! Form::textarea('description', null, ['class'=>'ckeditor', 'required']) !!}
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-success form-control']) !!}
  </div>
</div>
@section('footer')
  <script>
  $('#tag_list').select2({
    placeholder: 'Choose a tag',
  });
  </script>
@endsection
