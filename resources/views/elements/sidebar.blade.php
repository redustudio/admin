<div id="sidebar-wrapper">
  <div class="brand">
      <a href="#" class="brand-logo">{{ config('app.name') }}</a>
  </div>

    <nav>
        <ul class="nav mb-1" id="navmenu">
            <li class="profile card">
                <a data-toggle="collapse" data-parent="#navmenu" class="truncate" href="#profile-collapse" aria-expanded="false" aria-controls="profile-collapse">
                    <img src="{{ Avatar::create(strtoupper(auth()->user()->name))->toBase64() }}" class="avatar img-fluid rounded-circle" alt="user" title="user">
                    <span>{{ auth()->user()->name }}</span>
                </a>

                <ul class="collapse sub-menu" id="profile-collapse">
                    <li>
                        <a href="{{ route('reduvel-admin:logout') }}" class="text-danger">
                            @lang('reduvel-admin::fields.logout')
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="nav-title">@lang('reduvel-admin::page.navigation')</p>

        <ul class="nav" id="navmenu">
        @foreach (app('reduvel.admin.menu')->sortBy('order')->roots() as $menu)
            <li class="{{ $menu->isActive ? 'active' : '' }}{{ $menu->hasChildren() ? ' card' : '' }}">
                @if ($menu->hasChildren())
                    <a data-toggle="collapse" class="truncate" data-parent="#navmenu" href="#collapse-{{ $menu->id }}" aria-expanded="false" aria-controls="collapse-{{ $menu->id }}">
                        <i class="{{ $menu->data('icon') }}"></i> {{ $menu->title }}
                    </a>

                    <ul class="collapse {{ $menu->isActive ? 'in' : '' }} sub-menu" id="collapse-{{ $menu->id }}">
                    @foreach ($menu->children() as $subMenu)
                        <li @if($subMenu->isActive) class="active" @endif>
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
