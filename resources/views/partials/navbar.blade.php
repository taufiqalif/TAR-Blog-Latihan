<nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow" style="background-color: rgba(0, 0, 0, 0.7)">
  <div class="container">
    <a class="navbar-brand" href="/blog">TAR Blog</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-start">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ ($active === "blog") ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Welcome back, {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-sidebar-inset"> My Dashboard</i></a></li>
          <li><hr class="dropdown-divider"></li>

          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="bi bi-box-arrow-right"> Logout</i>
            </button>
          </form>
        </ul>
      </li>
      @else
        <li class="nav-item">
          <a class="nav-link {{ ($active === "login") ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      @endauth
    </ul>
    </div>
  </div>
</nav>