@section('title', 'Blog Details Page | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <style>
        .card-body img {
            max-width: 100% !important;
            height: auto !important;
            ;
        }
    </style>

    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('uploads/' . $blog->thumbnail) }}');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        @foreach ($blog->blogcategories as $category)
                            <a href="javascript:void(0)" class="badge badge-link bg-primary">{{ $category->name }}</a>
                        @endforeach
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark mt-4">
                            {{ $blog->title }}
                        </h5>

                        <ul class="list-inline text-center mb-0">
                            <li class="list-inline-item mx-4 mt-4">
                                <span class="text-white-50 d-block">Author</span>
                                <a href="{{ route('user.profile', $blog->user_id) }}"
                                    class="text-white title-dark">{{ $blog->user->name }}</a>
                            </li>

                            <li class="list-inline-item mx-4 mt-4">
                                <span class="text-white-50 d-block">Date</span>
                                <span class="text-white title-dark">{{ $blog->created_at->format('d F y') }}</span>
                            </li>

                            <li class="list-inline-item mx-4 mt-4">
                                <span class="text-white-50 d-block">Read Time</span>
                                <span class="text-white title-dark">{{ $blog->read_time }} min read</span>
                            </li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
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

    <!-- Start Blogs -->
    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-7">
                    @if ($blog->user_id == auth()->user()->id)
                        <div class="d-flex justify-content-end mb-3" style="gap: 0.5rem">
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-warning icon-link">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete Confirmation Modal Starts -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to move this blog into trash?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn icon-link btn-danger">
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Confirmation Modal Ends -->
                            <a class="btn btn-sm icon-link btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fa-regular fa-trash-can"></i>
                                <span>Move to trash</span>
                            </a>
                        </div>
                    @endif

                    <div class="card border-0 shadow rounded overflow-hidden">
                        <div class="card-body">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div><!--end col-->

                <!-- START SIDEBAR -->
                @include('blog.sidebar')
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Blogs -->
    @include('layout.footer')
@endsection
