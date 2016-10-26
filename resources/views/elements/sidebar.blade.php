<div id="sidebar-wrapper">
  <div class="brand">
      <a href="#" class="brand-logo">{{ config('app.name') }}</a>
  </div>

    <nav>
        <ul class="nav mb-1" id="navmenu">
            <li class="profile card panel">
                <a data-toggle="collapse" data-parent="#navmenu" class="truncate" href="#profileCollapse" aria-expanded="false" aria-controls="profileCollapse">
                    <img src="{{ Avatar::create(strtoupper(auth()->user()->name))->toBase64() }}" class="avatar img-fluid rounded-circle" alt="user" title="user">
                    <span>{{ auth()->user()->name }}</span>
                </a>

                <ul class="collapse sub-menu" id="profileCollapse">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li>
                        <a href="#">Update Password</a>
                    </li>
                    <li>
                        <a href="{{ route('reduvel-admin:logout') }}" class="text-danger">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="nav-title">NAVIGATION</p>
        <ul class="nav" id="navmenu">
        @foreach (app('reduvel.admin.menu')->roots() as $menu)
            <li class="{{ $menu->isActive ? 'active' : '' }}{{ $menu->hasChildren() ? 'card panel' : '' }}">
                @if ($menu->hasChildren())
                    <a data-toggle="collapse" class="truncate" data-parent="#navmenu" href="#{{ $menu->id }}-collapse" aria-expanded="false" aria-controls="{{ $menu->id }}-collapse">
                        <i class="{{ $menu->data('icon') }}"></i> {{ $menu->title }}
                    </a>

                    <ul class="collapse sub-menu" id="{{ $menu->id }}-collapse">
                    @foreach ($menu->children() as $subMenu)
                        <li>
                            <a href="{{ $subMenu->url() }}">{{ $subMenu->title }}</a>
                        </li>
                    @endforeach
                    </ul>
                @else
                    <a href="{{ $menu->url() }}" class="truncate">
                        <i class="{{ $menu->data('icon') }}"></i> {{ $menu->title }}
                    </a>
                @endif
            </li>
        @endforeach
        </ul>
    </nav>
</div>
