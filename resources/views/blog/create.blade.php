@section('title', 'Blogs Page')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <!-- Start -->
    {{-- <section class="section pt-5">
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label for="title" class="form-label fw-semibold">Blog Title: </label>
                    <input type="text" class="form-control @error('titile') is-invaild @enderror" name="title"
                        id="title" placeholder="Name your blog">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
        </div><!--end container-->
    </section><!--end section--> --}}
    <section class="section pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card bg-white p-4 rounded shadow sticky-bar">
                        <h4>Post a new <span class="text-primary">blog</span></h4>
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                {{-- Blog Title  --}}
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label fw-semibold">Blog Title: </label>
                                    <input type="text" class="form-control @error('title') is-invaild @enderror"
                                        name="title" id="title" placeholder="Name your blog"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Blog Title  --}}

                                {{-- Blog Tag  --}}
                                <div class="col-6 mb-3">
                                    <label for="category" class="form-label fw-semibold">Blog Tags: </label>
                                    <select class="form-select" name="category[]" id="category" multiple>
                                        <option selected>Tags</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Blog Tag  --}}

                                {{-- Read Time  --}}
                                <div class="col-6 mb-3">
                                    <label for="read_time" class="form-label fw-semibold">Read Time (minutes): </label>
                                    <input type="number" class="form-control @error('read_time') is-invaild @enderror"
                                        name="read_time" id="read_time"
                                        placeholder="Estimated time required to read the blog"
                                        value="{{ old('read_time') }}">
                                    @error('read_time')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Read Time  --}}

                                {{-- Thumbnail  --}}
                                <div class="col-6 mb-3">
                                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail Photo: </label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        name="thumbnail" id="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Thumbnail  --}}

                                {{-- Image  --}}
                                <div class="col-6 mb-3">
                                    <label for="img" class="form-label fw-semibold">Main Photo: </label>
                                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                                        name="img" id="img">
                                    @error('img')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Image  --}}

                                {{-- Intro  --}}
                                <div class="col-12 mb-3">
                                    <label for="intro" class="form-label fw-semibold">Blog Intro: </label>
                                    <textarea class="form-control @error('intro') is-invalid @enderror" name="intro" id="intro" rows="5">{{ old('intro') }}</textarea>
                                    @error('intro')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Intro  --}}

                                {{-- Body --}}
                                <div class="col-12 mb-3">
                                    <label for="body" class="form-label fw-semibold">Blog Body: </label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5">{{ old('intro') }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Body --}}

                                {{-- Visual Text  --}}
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="enableVisual"
                                            name="enableVisual">
                                        <label class="form-check-label fw-semibold" for="enableVisual">Include a visual
                                            text</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-0 mb-3">
                                    <label for="visual" class="form-label fw-semibold">Visual Text: </label>
                                    <input type="text" class="form-control @error('visual') is-invaild @enderror"
                                        name="visual" id="visual" placeholder="Enter your visual text"
                                        value="{{ old('visual') }}" disabled>
                                    @error('visual')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Visual Text  --}}

                                {{-- Conclusion  --}}
                                <div class="col-12 mb-3">
                                    <label for="conclusion" class="form-label fw-semibold">Blog Conclusion: </label>
                                    <textarea class="form-control @error('conclusion') is-invalid @enderror" name="conclusion" id="conclusion"
                                        rows="5">{{ old('conclusion') }}</textarea>
                                    @error('conclusion')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Conclusion  --}}
                            </div>
                            <div class="d-flex justify-content-end m-5">
                                <input type="submit" class="btn btn-primary" value="Post">
                            </div>
                        </form>
                    </div>
                </div>

                @include('blog.sidebar')
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')

    <script>
        // Get references to the checkbox and the visual text input
        var enableVisualCheckbox = document.getElementById('enableVisual');
        var visualInput = document.getElementById('visual');

        // Add an event listener to the checkbox
        enableVisualCheckbox.addEventListener('change', function() {
            // Enable or disable the visual input based on the checkbox state
            visualInput.disabled = !enableVisualCheckbox.checked;
        });
    </script>
@endsection
