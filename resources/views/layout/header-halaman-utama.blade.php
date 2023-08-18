<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
              <img src="{{ asset('gorlib.png') }}" alt="">
          </div>
        </div>
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#varyingModal" data-whatever="@mdo">Tamu</button>
      </li>

      <li class="nav-item dropdown nav-notifications">
          <a href="#" class="btn btn-primary active" role="button" aria-pressed="true">Login</a>
      </li>
    </ul>
  </div>
</nav>
