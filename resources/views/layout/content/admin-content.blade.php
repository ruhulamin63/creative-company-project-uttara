<!DOCTYPE html>
<html lang="en">

    @include('layout.head.admin-head')
	@include('layout.navbar.admin-navbar')
	@include('layout.sidebar.admin-sidebar')

    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        
            @yield('content')

        @include('layout.footer.admin-footer')
        @include('layout.scripts.admin-scripts')
    </body>
</html>