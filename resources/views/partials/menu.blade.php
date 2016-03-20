<!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Daily Classifieds</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('profile', Auth::user()->id) }}">Profile</a></li>
              <li><a href="{{ route('user.ads', Auth::user()->id) }}">My Ads</a></li>
              @if(Auth::user()->rank == 'admin')
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Admin</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
              @endif
            </ul>
          </li>
          <li><a href="/logout">Logout</a></li>
        @else
        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="/login">Login</a></li>
        <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="/register">Register</a></li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>
<div class="container">
  <a href="{{ route('ad.create') }}" class="btn btn-warning pull-right">Create an Ad</a>
</div>
