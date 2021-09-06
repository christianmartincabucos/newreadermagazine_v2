@push('css')
<style>

</style>
@endpush

<nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar">
    <div class="container py-1">
        <a class="navbar-brand font-weight-bold title " href="{{ url('/') }}">
            <img src="{{ asset('storage/logos/NRMag-blacklogo.png')}}" class="img-fluid" style="width:60px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <!-- <form class="form-search form-inline my-2 pl-md-4 my-lg-0">
                <input type="search" class="searh-bar" placeholder="Search" >
                <i class="fa fa-search text-red"></i>
            </form> -->
            <ul class="navbar-nav mr-auto smooth-scroll pl-sm-0 pl-md-2">
                <li class="nav-item">
                    <a class="nav-link text-red-light font gotham-medium px-sm-0 pl-md-1 pr-md-3" href="" data-offset="90">PRODUCTS</a>
                </li>
                <li class="nav-item font gotham-medium dropdown">
                    <a class="nav-link dropdown-toggle text-red-light pl-sm-0 pl-md-3" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    BLOGS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-red-light" href="">LATEST</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item text-red-light dropdown-toggle" href="#">FEATURED</a>
                            <ul class="dropdown-menu ml-3">
                                <li><a class="font gotham-medium dropdown-item text-red-light" href="">BLOG</a></li>

                            </ul>
                        </li>
                        <li><a class="dropdown-item text-red-light" href="{{ route('blog-nmagazine') }}">NRMAGAZINE</a></li>
                    </ul>
                </li>
                <li class="nav-item font gotham-medium dropdown">
                    <a class="nav-link dropdown-toggle text-red-light pl-sm-0 pl-md-3" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    PARTNER WITH US
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-red-light" href="{{ route('terms-conditions') }}">TERMS & CONDITIONS</a></li>
                        <li><a class="dropdown-item text-red-light" href="{{ route('privacy-policy') }}">PRIVACY POLICY</a></li>
                    </ul>
                </li>
                <li class="nav-item font gotham-medium dropdown">
                    <a class="nav-link dropdown-toggle px-0 px-md-3 text-red-light" href="#" id="navbardrop" data-toggle="dropdown">
                        ACCOUNT
                    </a>
                    <div class="dropdown-menu">
                        @guest
                        <a class="dropdown-item text-red-light" href="{{ url('/login') }}">LOGIN</a>
                        <a class="dropdown-item text-red-light" href="{{ url('/register') }}">
                        REGISTER
                        <span><sup class="text-red font gotham-medium bg-white rounded-lg px-1 shadow-lg">new user</sup></span>
                    </a>
                    @else
                    @if(Auth::user()->is_verified != 6)
                        <a class="dropdown-item" data-toggle="modal" data-target="#createblog">CREATE BLOG</a>
                        <a class="dropdown-item text-red-light"
                        href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            LOGOUT
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endif
                        @endguest
                        <!-- <a class="dropdown-item text-red-light" href="#">PERSONAL BLOGS</a>
                        <a class="dropdown-item text-red-light" href="#">GALLERIES</a> -->
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://facebook.com/newreadermedia" target="_blank">
                        <i class="fab fa-facebook-f text-red-light"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/newreadermedia" target="_blank">
                        <i class="fab fa-twitter text-red-light"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://instagram.com/newreadermedia" target="_blank">
                        <i class="fab fa-instagram text-red-light"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('js')
<script>
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });
        return false;
    });

</script>
@endpush
