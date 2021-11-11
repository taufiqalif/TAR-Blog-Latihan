<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <span data-feather="file-text"></span>
          My Posts
        </a> 
      </li>
    </ul>


    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="list"></span>
          Post Category
        </a>
      </li>
    </ul>
    @endcan



    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-5 mb-1 text-muted">
      <span>Home</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
          <span data-feather="arrow-left-circle"></span>
          Back to Home
        </a>
      </li>
    </ul>

  </div>
</nav> 