<nav class="navbar navbar-dark bg-primary px-1">
    <div class="container-fluid">
        <ul class="nav navbar-nav hidden-lg-up">
            <li class="nav-item">
                <button class="navbar-toggler mr-1" id="menu-toggle" type="button"></button>
            </li>
        </ul>

        <a class="navbar-brand" href="#">
            {{ $pageTitle or 'Page Title' }}
        </a>

        <ul class="nav navbar-nav float-xs-right">
            <li class="nav-item">
                <a href="{{ route('reduvel-admin:logout') }}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="@lang('reduvel-admin::fields.logout')">
                    <i class="fa fa-sign-out"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
