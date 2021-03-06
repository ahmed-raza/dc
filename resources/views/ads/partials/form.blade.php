<div class="col-md-6">
  <div class="row">
    <div class="">
      {!! Form::label('Title') !!}
      {!! Form::text('title', null, ['class'=>'form-control', 'required']) !!}
    </div>
  </div>
  <div class="row">
    <div class="">
      {!! Form::label('category', 'Category') !!}
      {!! Form::select('category_list[]', $categories, null, ['class'=>'form-control', 'id'=>'tag_list', 'multiple']) !!}
    </div>
  </div>
  <div class="row">
    <div class="">
      {!! Form::label('City') !!}
      {!! Form::text('city', null, ['class'=>'form-control', 'required']) !!}
    </div>
  </div>
  <div class="row">
    <div class="">
      {!! Form::label('Images') !!}
      {!! Form::file('images[]', ['multiple'=>true]) !!}
    </div>
  </div>
</div>
@if(isset($adImages))
  <div class="col-md-6">
    <div class="images">
      @foreach($adImages as $image)
        @if(!empty($image))
          <div class="thumb">
            <img src="/images/ads/{{ $ad->id }}/t-{{ $image }}" alt="">
            <div class="overlay">
              <span class="remove">remove</span>
            </div>
          </div>
        @endif
      @endforeach
      {!! Form::hidden('removeImages', '' , ['id'=>"removeImages"]) !!}
    </div>
  </div>
@endif
<div class="row">
  <div class="col-md-12">
    {!! Form::label('Description') !!}
    {!! Form::textarea('description', null, ['class'=>'ckeditor', 'required']) !!}
  </div>
</div>
<div class="row">
@if(Auth::user() && Auth::user()->rank == 'admin')
  <div class="col-md-12">
    {!! Form::hidden('approve', 0) !!}
    {!! Form::checkbox('approve', 1, null, ['id'=>'approve']) !!} {!! Form::label('approve', 'Approve it') !!}
  </div>
@endif
  <div class="col-md-12">
    {!! Form::hidden('status', 0) !!}
    {!! Form::checkbox('status', 1, null, ['id'=>'status']) !!} {!! Form::label('status', 'Publish') !!}
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
    placeholder: 'Choose category',
  });
  </script>
@endsection
