<style>
    ul {
        padding: 0 !important;
    }

    .wrapper .img-fluid {
        width: 46px;
        height: 46px;
    }
</style>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel" style="transition: 0.3s; width: ">
    <div class="wrapper">
        <div class="header-top">
            <a @auth href="{{ route('user.profile', auth()->user()->id) }}" @endauth class="user-account">
                <p class="btn btn-lg btn-icon btn-pills btn-primary m-0 me-2">
                    @auth
                        @if (auth()->user()->img == null)
                            <img src="images/guest.jpg" class="img-fluid rounded-pill" alt="">
                        @else
                            <img src="{{ asset('uploads/' . auth()->user()->img) }}" class="img-fluid rounded-pill"
                                alt="">
                        @endif
                    @else
                        <img src="images/guest.jpg" class="img-fluid rounded-pill" alt="">
                    @endauth
                </p>
                <div class="content">
                    @auth
                        <h5 class="user-name"><span class="text-primary">{{ auth()->user()->name }}</span></h5>
                    @else
                        <div class="buttons-group">
                            <a href="{{ route('user.login') }}" class="btn">Sign in</a>
                            <a href="{{ route('user.register') }}" class="btn">Sign up</a>
                        </div>
                    @endauth
                    {{-- <p class="font-xs text-muted m-0">You have 2 new messages</p> --}}
                </div>
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children pt-0"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="index.html">Home</a>
                            </li>
                            <li class="has-children"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="{{ route('job.index') }}">Browse Jobs</a>
                            </li>
                            <li class="has-children">
                                <span class="menu-expand">
                                    <i class="fi-rr-angle-small-down"></i>
                                </span>
                                <a class="link position-relative" href="{{ route('user.bookmark') }}">
                                    Bookmarks
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger"
                                        style="left: 120%">
                                        {{ $count }}
                                        @if ($count > 9)+@endif
                                    </span>
                                </a>
                            </li>
                            <li class="has-children"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="employers-grid.html">Employers</a>
                            </li>
                            <li class="has-children"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="candidates-grid.html">Candidates</a>
                            </li>
                            <li class="has-children"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="#">Blog</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="account">
                    <h5 class="mb-3">Your Account</h5>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Work Preferences</a></li>
                        <li><a href="#">My Boosted Shots</a></li>
                        <li><a href="#">My Collections</a></li>
                        <li><a href="{{ route('user.settings', auth()->user()->id) }}">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="/user/logout">Sign Out</a></li>
                    </ul>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h5 class="mb-25">Follow Us</h5>
                    <div class="row g-0 justify-content-between align-items-center">
                        <a href="#" class="col-2"><img src="{{ asset('/images/logo/facebook.svg') }}"></a>
                        <a href="#" class="col-2"><img src="{{ asset('/images/logo/instagram.svg') }}"></a>
                        <a href="#" class="col-2"><img src="{{ asset('/images/logo/twitter.svg') }}"></a>
                        <a href="#" class="col-2"><img src="{{ asset('/images/logo/discord.svg') }}"></a>
                        <a href="#" class="col-2"><img src="{{ asset('/images/logo/telegram.svg') }}"></a>
                    </div>
                </div>
                <div class="site-copyright text-muted text-center py-5">Copyright 2023 © Skilltrack.</div>
            </div>
        </div>
    </div>
</div>
