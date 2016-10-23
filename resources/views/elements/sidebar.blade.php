<div id="sidebar-wrapper">
  <div class="brand">
      <a href="#" class="brand-logo">{{ config('app.name') }}</a>
  </div>

    <nav>
        <ul class="nav mb-1" id="navmenu">
            <li class="profile card panel">
                <a data-toggle="collapse" data-parent="#navmenu" class="truncate" href="#profileCollapse" aria-expanded="false" aria-controls="profileCollapse">
                    <img src="{{ Avatar::create('Administrator')->toBase64() }}" class="avatar img-fluid rounded-circle" alt="user" title="user">
                    <span>User's Name</span>
                </a>

                <ul class="collapse sub-menu" id="profileCollapse">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li>
                        <a href="#">Update Password</a>
                    </li>
                    <li>
                        <a href="#" class="text-danger">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="nav-title">NAVIGATION</p>
        <ul class="nav" id="navmenu">
            <li>
                <a href="/" class="truncate"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
        </ul>
    </nav>
</div>
