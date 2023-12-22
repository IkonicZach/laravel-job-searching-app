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
            <a href="{{ route('employer.profile') }}" class="user-account">
                <p class="btn btn-lg btn-icon btn-pills btn-primary m-0 me-2">
                    @auth
                        <img src="{{ asset('uploads/' . auth()->user()->img) }}" class="img-fluid rounded-pill"
                            alt="">
                    @else
                        <img src="images/guest.jpg" class="img-fluid rounded-pill" alt="">
                    @endauth
                </p>
                <div class="content">
                    @auth
                        <h5 class="user-name"><span class="text-primary">{{ auth()->user()->name }}</span></h5>
                    @else
                        <div class="buttons-group">
                            <a href="/user/login" class="btn">Sign in</a>
                            <a href="/user/register/checkpoint" class="btn">Sign up</a>
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
                                <a class="link" href="job-grid.html">Browse Jobs</a>
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
                            <li class="has-children"><span class="menu-expand"><i
                                        class="fi-rr-angle-small-down"></i></span>
                                <a class="link" href="#">Pages</a>
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
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="/user/logout">Sign Out</a></li>
                    </ul>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h5 class="mb-25">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt="jobhub"></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt="jobhub"></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt="jobhub"></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt="jobhub"></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt="jobhub"></a>
                </div>
                <div class="site-copyright">Copyright 2022 © JobHub. <br>Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
