<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <a class="logo" href="/">
            <span class="logo-light-mode">
                <img src="{{ asset('images/logo-dark.png') }}" class="l-dark" alt="">
                <img src="{{ asset('images/logo-white.png') }}" class="l-light" alt="">
            </span>
            <img src="{{ asset('images/logo-white.png') }}" class="logo-dark-mode" alt="">
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item ps-1 mb-0">
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded border-0 mt-3 p-0"
                        style="width: 240px;">
                        <div class="search-bar">
                            <div id="itemSearch" class="menu-search mb-0">
                                <form role="search" method="get" id="searchItemform" class="searchform">
                                    <input type="text" class="form-control rounded border" name="s"
                                        id="searchItem" placeholder="Search...">
                                    <input type="submit" id="searchItemsubmit" value="Search">
                                    <i class="fa-solid fa-magnifying-glass lens"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="list-inline-item ps-1 mb-0">
                <button type="button" class="btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    @auth
                        @if (auth()->user()->img == null)
                            <img src="{{ asset('images/guest.jpg') }}" class="img-fluid rounded-pill" alt="">
                        @else
                            <img src="{{ asset('uploads/' . auth()->user()->img) }}" class="img-fluid rounded-pill"
                                alt="">
                        @endif
                    @else
                        <img src="{{ asset('images/guest.jpg') }}" class="img-fluid rounded-pill" alt="">
                    @endauth
                </button>
                @include('layout.navpanel')
            </li>
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right nav-light">

                <li class="has-submenu parent-menu-item">
                    <a>Browse</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('job.index') }}" class="sub-menu-item">Jobs</a></li>
                        <li><a href="{{ route('candidate.index') }}" class="sub-menu-item">Candidates</a></li>
                        <li><a href="{{ route('company.index') }}" class="sub-menu-item">Companies</a></li>
                    </ul>
                </li>

                {{-- <li><a href="{{ route('blog.index') }}" class="sub-menu-item">Blog</a></li> --}}

                @auth
                    <li class="position-relative">
                        @role('candidate')
                            <a href="{{ route('user.bookmark.list') }}" class="sub-menu-item">My Jobs</a>
                            @if ($countJobs > 0)
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger"
                                    style="left: 100%; top:25%;">
                                    {{ $countJobs }}
                                    @if ($countJobs > 9)
                                        +
                                    @endif
                                </span>
                            @endif
                        @endrole
                        @role('employer')
                            <a href="{{ route('user.bookmark.list') }}" class="sub-menu-item">Bookmarks</a>
                            @if ($countUsers > 0)
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger"
                                    style="left: 100%; top:25%;">
                                    {{ $countUsers }}
                                    @if ($countUsers > 9)
                                        +
                                    @endif
                                </span>
                            @endif
                        @endrole
                    </li>
                @endauth

                <li><a href="{{ route('contact.index') }}" class="sub-menu-item">Contact Us</a></li>

                @role('admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="sub-menu-item">Admin Panel</a></li>
                @endrole
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div>
</header>
<!-- Navbar End -->
