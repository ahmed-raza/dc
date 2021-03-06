<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Classifieds</title>
  {!! HTML::style('css/bootstrap.css') !!}
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/select2.min.css') !!}
  {!! HTML::style('css/style.css') !!}
  {!! HTML::script('js/jquery-1.11.1.js') !!}
  {!! HTML::script('js/bootstrap.js') !!}
  @if(Auth::check() && Auth::user()->rank == 'admin')
  {!! HTML::script('ckeditor-full/ckeditor.js') !!}
  @else
  {!! HTML::script('ckeditor/ckeditor.js') !!}
  @endif
  {!! HTML::script('js/select2.min.js') !!}
  {!! HTML::script('js/custom.js') !!}
</head>
<body>
  <div class="header">
    @include('partials.menu')
  </div>
  <div class="container">
    <div class="content">
      <div class="post-ad">
        <a href="{{ route('ad.create') }}" class="btn btn-warning pull-right">Create an Ad</a>
      </div>
      @include('partials.messages')
      @include('partials.sidebar')
      @yield('content')
    </div>
    <div class="footer">
      @yield('footer')
    </div>
  </div>
</body>
</html>
