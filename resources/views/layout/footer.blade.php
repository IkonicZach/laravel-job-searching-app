<!-- Footer Start -->
<footer class="bg-footer">
    @auth
    @else
        <div class="py-5">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-7">
                        <div class="section-title">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bookmark fea icon-lg">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="flex-1 ms-3">
                                    <h4 class="fw-bold text-white mb-2">Explore a job now!</h4>
                                    <p class="text-white-50 mb-0">Search all the open positions on the web. Get your own
                                        personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-5 mt-4 mt-sm-0">
                        <div class="text-md-end ms-5 ms-sm-0">
                            <a href="{{ route('user.login') }}" class="btn btn-primary me-1 my-1">Apply Now</a>
                            <a href="{{ route('contact.index') }}" class="btn btn-soft-primary my-1">Contact Us</a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end div-->
    @endauth
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-5 footer-bar">
                    <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="text-center text-sm-start">
                                <a href="#"><img src="images/logo-light.png" alt=""></a>
                            </div>
                        </div>

                        <div class="col-sm-9 mt-4 mt-sm-0">
                            <ul class="list-unstyled footer-list terms-service text-center text-sm-end mb-0">
                                <li class="list-inline-item my-2">
                                    <a href="/" class="text-foot fs-6 fw-medium me-2">
                                        <i class="fa-regular fa-circle"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="list-inline-item my-2">
                                    <a href="{{ route('services') }}" class="text-foot fs-6 fw-medium me-2">
                                        <i class="fa-regular fa-circle"></i>
                                        How it works
                                    </a>
                                </li>
                                <li class="list-inline-item my-2">
                                    <a href="{{ route('job.create') }}" class="text-foot fs-6 fw-medium me-2">
                                        <i class="fa-regular fa-circle"></i>
                                        Create a job
                                    </a>
                                </li>
                                <li class="list-inline-item my-2">
                                    <a href="{{ route('aboutus.index') }}" class="text-foot fs-6 fw-medium me-2">
                                        <i class="fa-regular fa-circle"></i>
                                        About us
                                    </a>
                                </li>
                                <li class="list-inline-item my-2">
                                    <a href="pricing.html" class="text-foot fs-6 fw-medium">
                                        <i class="fa-regular fa-circle"></i>
                                        Plans
                                    </a>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="py-4 footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start">
                        <p class="mb-0 fw-medium">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Jobnova. Made with <i
                                class="fa-solid fa-heart text-danger"></i></i>.
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <ul class="list-unstyled social-icon foot-social-icon text-sm-end mb-0">
                        <li class="list-inline-item"><a href="https://1.envato.market/jobnova" target="_blank"
                                class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shopping-cart fea icon-sm align-middle" title="Buy Now">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg></a></li>
                        <li class="list-inline-item"><a href="https://dribbble.com/shreethemes" target="_blank"
                                class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-dribbble fea icon-sm align-middle" title="dribbble">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path
                                        d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32">
                                    </path>
                                </svg></a></li>
                        <li class="list-inline-item"><a href="http://linkedin.com/company/shreethemes"
                                target="_blank" class="rounded"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-linkedin fea icon-sm align-middle"
                                    title="Linkedin">
                                    <path
                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                    </path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-facebook fea icon-sm align-middle" title="facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-instagram fea icon-sm align-middle" title="instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                                    </rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/shreethemes" target="_blank"
                                class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-twitter fea icon-sm align-middle" title="twitter">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                    </path>
                                </svg></a></li>
                    </ul><!--end icon-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</footer>
<!-- Footer End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded fs-5"
    style="display: block !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" class="feather feather-arrow-up fea icon-sm align-middle">
        <line x1="12" y1="19" x2="12" y2="5"></line>
        <polyline points="5 12 12 5 19 12"></polyline>
    </svg></a>

<div role="dialog" aria-hidden="true" class="tobii"><button class="tobii__prev" type="button"
        aria-label="Previous image"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M14 18l-6-6 6-6"></path>
        </svg></button><button class="tobii__next" type="button" aria-label="Next image"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"
            focusable="false">
            <path d="M10 6l6 6-6 6"></path>
        </svg></button><button class="tobii__close" type="button" aria-label="Close lightbox"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"
            focusable="false">
            <path d="M6 6l12 12M6 18L18 6"></path>
        </svg></button>
    <div class="tobii__counter"></div>
    <div class="tobii__slider">
        <div class="tobii__slider-slide" style="position: absolute; left: 0%;">
            <div data-player="0" data-type="youtube"><iframe frameborder="0" allowfullscreen=""
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    title="Landrick Saas and Software Landing Page Template" width="640" height="360"
                    src="https://www.youtube-nocookie.com/embed/yba7hPeTSjk?controls=1&amp;rel=0&amp;playsinline=1&amp;enablejsapi=1&amp;widgetid=1"
                    id="widget2"></iframe></div>
        </div>
    </div>
</div>
<!-- Back to top -->
