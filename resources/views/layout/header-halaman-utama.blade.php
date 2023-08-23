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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#varyingModal"
                        data-whatever="@mdo">Tamu
                </button>
            </li>

            @if(Route::has('login'))
                @auth
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                    <p class="email text-muted mb-3"> {{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="{{ url('/general/profile') }}" class="nav-link">
                                            <i data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown nav-notifications">
                        <a href="/login" class="btn btn-primary active" role="button" aria-pressed="true">Login</a>
                    </li>
                @endauth
            @endif

        </ul>
    </div>
</nav>
