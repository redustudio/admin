@extends('reduvel.admin::layouts.base')

@section('body')
    <div id="wrapper">
        @include('reduvel.admin::elements.sidebar')
        <div id="page-content-wrapper">
            @include('reduvel.admin::elements.topbar')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
