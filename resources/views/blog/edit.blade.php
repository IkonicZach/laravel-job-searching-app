@section('title', 'Edit Blog | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <section class="section pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card bg-white p-4 rounded shadow sticky-bar">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Edit your <span class="text-primary">blog</span></h4>
                            <small class="text-muted">Last updated at
                                {{ $blog->updated_at->format('d-M-Y / H:m:s') }}</small>
                        </div>
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                {{-- Blog Title  --}}
                                <div class="col-12 mb-3">
                                    <label for="title" class="form-label fw-semibold">Blog Title: </label>
                                    <input type="text" class="form-control @error('title') is-invaild @enderror"
                                        name="title" id="title" placeholder="Name your blog"
                                        value="{{ $blog->title }}">
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
                                        <option value="" disabled selected>Tags</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @foreach ($blog->blogcategories as $blogCategory)
                                                    @if ($blogCategory->id == $category->id)
                                                    selected
                                                    @endif @endforeach>
                                                {{ $category->name }}</option>
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
                                        value="{{ $blog->read_time }}">
                                    @error('read_time')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Read Time  --}}

                                {{-- Thumbnail  --}}
                                <div class="col-12 mb-3">
                                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail Photo: </label>
                                    <a href="{{ asset('uploads/' . $blog->thumbnail) }}">{{ $blog->thumbnail }}</a>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        name="thumbnail" id="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Thumbnail  --}}

                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label fw-semibold">Blog Content: </label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="description" rows="5">{{ $blog->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end m-5">
                                <input type="submit" class="btn btn-primary" value="Confirm Changes">
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
        ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

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
