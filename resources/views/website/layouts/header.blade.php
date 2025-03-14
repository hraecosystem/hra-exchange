<header class="site-header fugu--header-section fugu--header-three" id="sticky-menu">
    <div class="container-fluid">
        <nav class="navbar site-navbar">
            <!-- Brand Logo-->
            <div class="brand-logo rt-mr-20">
                <a href="{{ route('website.home') }}">
                    <img src="{{ settings()->getFileUrl('logo_white', asset(env('LOGO_WHITE'))) }}" alt=""
                         class="light-version-logo">
                </a>
            </div>
            <div class="menu-block-wrapper">
                <div class="menu-overlay"></div>
                <nav class="menu-block" id="append-menu-header">
                    <div class="mobile-menu-head">
                        <div class="go-back">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="site-menu-main">
                        <li class="nav-item ">
                            <a href="#home" class="nav-link-item ">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#partners" class="nav-link-item ">Partners</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#build" class="nav-link-item ">Build</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#ecoSystem" class="nav-link-item ">EcoSystem</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#blockchain" class="nav-link-item ">HRAChain</a>
                        </li>
                        <li class="nav-item">
                            <a href="#footer" class="nav-link-item ">Join Community</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-none">
                            <a href="{{ settings('white_paper_link') }}" class="nav-link-item" target="_blank">WhitePaper</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item d-lg-none d-md-none">
                                <a href='{{ route('member.login.create') }}' class="nav-link-item ">
                                    User Panel
                                </a>
                            </li>
                        @else
                            <li class="nav-item d-lg-none d-md-none">
                                <a href='{{ route('member.login.create') }}' class="nav-link-item ">
                                    Buy Now
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                <a class='fugu--btn fugu--menu-btn3 me-2' href='{{ settings('white_paper_link') }}' target="_blank">
                    WhitePaper
                </a>
                @if(Auth::check())
                    <a class='fugu--btn fugu--menu-btn3' href='{{ route('member.login.create') }}'>
                        User Panel
                    </a>
                @else
                    <a class='fugu--btn fugu--menu-btn3' href='{{ route('member.login.create') }}'>
                        Buy Now
                </a>
                @endif
            </div>
            <!-- mobile menu trigger -->
            <div class="mobile-menu-trigger">
                <span></span>
            </div>
            <!--/.Mobile Menu Hamburger Ends-->
        </nav>
    </div>
</header>
