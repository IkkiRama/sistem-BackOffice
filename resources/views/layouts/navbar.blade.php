<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Test</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        @if(auth()->user()->role === "admin")
        <a class="nav-link" href="{{ url('/user') }}">User</a>
        <a class="nav-link" href="{{ url('/group') }}">Group</a>
        <a class="nav-link" href="{{ url('/deleteAll') }}" onclick="return confirm('Yakin Anda mau mengghapus semua data?')">Delete All</a>
        @endif
        <a class="nav-link" href="{{ url('/getUser') }}">Get User</a>
        @if(auth()->user())
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
        @else
        <a class="nav-link" href="{{ url('/login') }}">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>