<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Classifieds</title>
  {!! HTML::style('css/bootstrap.css') !!}
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/select2.min.css') !!}
  {!! HTML::script('js/jquery-1.11.1.js') !!}
  {!! HTML::script('js/bootstrap.js') !!}
  {!! HTML::script('ckeditor-full/ckeditor.js') !!}
  {!! HTML::script('js/select2.min.js') !!}
</head>
<body>
  <div class="container">
    <div class="left-sidebar">
      @include('partials.nav')
    </div>
    @include('partials.messages')
    @yield('content')
  </div>
  @include('partials.footer')
</body>
</html>
