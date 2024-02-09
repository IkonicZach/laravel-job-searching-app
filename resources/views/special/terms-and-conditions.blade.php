@section('title', 'Terms and Conditions | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')

    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('/images/hero/bg.jpg') }}');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Terms of Services</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item active" aria-current="page">T&C</li>
                    </ul>
                </nav>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Start Terms & Conditions -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card shadow border-0 rounded">
                        <div class="card-body">
                            <h5 class="card-title">Introduction :</h5>
                            <p class="text-muted">It seems that only fragments of the original text remain in the Lorem
                                Ipsum texts used today. One may speculate that over the course of time certain letters were
                                added or deleted at various positions within the text.</p>

                            <h5 class="card-title">User Agreements :</h5>
                            <p class="text-muted">The most well-known dummy text is the 'Lorem Ipsum', which is said to have
                                <b class="text-danger">originated</b> in the 16th century. Lorem Ipsum is <b
                                    class="text-danger">composed</b> in a pseudo-Latin language which more or less <b
                                    class="text-danger">corresponds</b> to 'proper' Latin. It contains a series of real
                                Latin words. This ancient dummy text is also <b class="text-danger">incomprehensible</b>,
                                but it imitates the rhythm of most European languages in Latin script. The <b
                                    class="text-danger">advantage</b> of its Latin origin and the relative <b
                                    class="text-danger">meaninglessness</b> of Lorum Ipsum is that the text does not attract
                                attention to itself or distract the viewer's <b class="text-danger">attention</b> from the
                                layout.
                            </p>
                            <p class="text-muted">There is now an <b class="text-danger">abundance</b> of readable dummy
                                texts. These are usually used when a text is <b class="text-danger">required purely</b> to
                                fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell
                                short, funny or <b class="text-danger">nonsensical</b> stories.</p>
                            <p class="text-muted">It seems that only <b class="text-danger">fragments</b> of the original
                                text remain in the Lorem Ipsum texts used today. One may speculate that over the course of
                                time certain letters were added or deleted at various positions within the text.</p>

                            <h5 class="card-title">Restrictions :</h5>
                            <p class="text-muted">You are specifically restricted from all of the following :</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Digital Marketing Solutions for Tomorrow
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Our Talented & Experienced Marketing Agency
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Create your own skin to match your brand
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Digital Marketing Solutions for Tomorrow
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Our Talented & Experienced Marketing Agency
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-arrow-right fea icon-sm me-2"></i>
                                    Create your own skin to match your brand
                                </li>
                            </ul>

                            <h5 class="card-title">Users Question & Answer :</h5>

                            <div class="accordion mt-4 pt-2" id="buyingquestion">
                                <div class="accordion-item rounded">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-0 bg-light" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" style="background: none !important">
                                            How does it work ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                        <div class="accordion-body text-muted">
                                            There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item rounded mt-2">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button border-0 bg-light collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo" style="background: none !important">
                                            Do I need a designer to use Jobnova ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse border-0 collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#buyingquestion">
                                        <div class="accordion-body text-muted">
                                            There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item rounded mt-2">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button border-0 bg-light collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree" style="background: none !important">
                                            What do I need to do to start selling ?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse border-0 collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#buyingquestion">
                                        <div class="accordion-body text-muted">
                                            There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item rounded mt-2">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button border-0 bg-light collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour"
                                            style="background: none !important">
                                            What happens when I receive an order ?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse border-0 collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#buyingquestion">
                                        <div class="accordion-body text-muted">
                                            There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <a href="javascript:void(0)" class="btn btn-primary mt-2 me-2">Accept</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary mt-2">Decline</a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Terms & Conditions -->

    @include('layout.footer')
@endsection