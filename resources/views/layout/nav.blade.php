        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <a class="logo" href="index.html">
                    <span class="logo-light-mode">
                        <img src="images/logo-dark.png" class="l-dark" alt="">
                        <img src="images/logo-white.png" class="l-light" alt="">
                    </span>
                    <img src="images/logo-white.png" class="logo-dark-mode" alt="">
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @auth
                                    <img src="images/team/01.jpg" class="img-fluid rounded-pill" alt="">
                                @else
                                    <img src="images/guest.jpg" class="img-fluid rounded-pill" alt="">
                                @endauth
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded shadow border-0 mt-3">
                                @auth
                                    <a href="candidate-profile.html" class="dropdown-item fw-medium fs-6"><i
                                            data-feather="user" class="fea icon-sm me-2 align-middle"></i>Profile</a>
                                    <a href="/candidate/logout" class="dropdown-item fw-medium fs-6"><i data-feather="log-out"
                                            class="fea icon-sm me-2 align-middle"></i>Logout</a>
                                @else
                                    <a href="/user/login" class="dropdown-item fw-medium fs-6"><i data-feather="lock"
                                            class="fea icon-sm me-2 align-middle"></i>Sign in</a>
                                    <a href="/user/register" class="dropdown-item fw-medium fs-6"><i data-feather="lock"
                                            class="fea icon-sm me-2 align-middle"></i>Sign up</a>
                                @endauth
                                <a href="/settings" class="dropdown-item fw-medium fs-6"><i
                                        data-feather="settings" class="fea icon-sm me-2 align-middle"></i>Settings</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-right nav-light">

                        <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Jobs </a><span
                                class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="job-categories.html" class="sub-menu-item">Job Categories</a></li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Grids </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-grid-one.html" class="sub-menu-item">Job Grid One</a></li>
                                        <li><a href="job-grid-two.html" class="sub-menu-item">Job Grid Two</a></li>
                                        <li><a href="job-grid-three.html" class="sub-menu-item">Job Grid Three</a>
                                        </li>
                                        <li><a href="job-grid-four.html" class="sub-menu-item">Job Grid Four </a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Lists </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-list-one.html" class="sub-menu-item">Job List One</a></li>
                                        <li><a href="job-list-two.html" class="sub-menu-item">Job List Two</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Detail </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-detail-one.html" class="sub-menu-item">Job Detail One</a>
                                        </li>
                                        <li><a href="job-detail-two.html" class="sub-menu-item">Job Detail Two</a>
                                        </li>
                                        <li><a href="job-detail-three.html" class="sub-menu-item">Job Detail Three</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="job-apply.html" class="sub-menu-item">Job Apply</a></li>

                                <li><a href="job-post.html" class="sub-menu-item">Job Post </a></li>

                                <li><a href="career.html" class="sub-menu-item">Career </a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Employers</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="employers.html" class="sub-menu-item">Employers</a></li>
                                <li><a href="employer-profile.html" class="sub-menu-item">Employer Profile</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Candidates</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="candidates.html" class="sub-menu-item">Candidates</a></li>
                                <li><a href="candidate-profile.html" class="sub-menu-item">Candidate Profile</a></li>
                                <li><a href="candidate-profile-setting.html" class="sub-menu-item">Profile Setting</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="aboutus.html" class="sub-menu-item">About Us</a></li>
                                <li><a href="services.html" class="sub-menu-item">Services</a></li>
                                <li><a href="pricing.html" class="sub-menu-item">Pricing </a></li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Helpcenter </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="helpcenter-overview.html" class="sub-menu-item">Overview</a></li>
                                        <li><a href="helpcenter-faqs.html" class="sub-menu-item">FAQs</a></li>
                                        <li><a href="helpcenter-guides.html" class="sub-menu-item">Guides</a></li>
                                        <li><a href="helpcenter-support.html" class="sub-menu-item">Support</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span
                                        class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="blogs.html" class="sub-menu-item"> Blogs</a></li>
                                        <li><a href="blog-sidebar.html" class="sub-menu-item"> Blog Sidebar</a></li>
                                        <li><a href="blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages
                                    </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="login.html" class="sub-menu-item"> Login</a></li>
                                        <li><a href="signup.html" class="sub-menu-item"> Signup</a></li>
                                        <li><a href="reset-password.html" class="sub-menu-item"> Forgot Password</a>
                                        </li>
                                        <li><a href="lock-screen.html" class="sub-menu-item"> Lock Screen</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility
                                    </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special
                                    </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="comingsoon.html" class="sub-menu-item"> Coming Soon</a></li>
                                        <li><a href="maintenance.html" class="sub-menu-item"> Maintenance</a></li>
                                        <li><a href="error.html" class="sub-menu-item"> 404! Error</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="contactus.html" class="sub-menu-item">Contact Us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div>
        </header>
        <!-- Navbar End -->
