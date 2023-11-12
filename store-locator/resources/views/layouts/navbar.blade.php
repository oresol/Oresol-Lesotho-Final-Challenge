<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand text-light"  href="{{ url('/') }}">
    <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="company-logo" width="50" height="50">
    Store Locator
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
      </li>
    </ul>
  </div>
</nav>

@yield('content')
</body>
</html>