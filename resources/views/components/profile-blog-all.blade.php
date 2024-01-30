<div class="modal fade" id="blogAll" tabindex="-1" aria-labelledby="blogAllLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px !important">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="blogAllLabel">All experiences</h1>
                @if (auth()->user()->id == request()->route()->id)
                    <a href="{{ route('blog.trash', auth()->user()->id) }}" class="btn btn-light icon-link">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Trash Can</span>
                    </a>
                @endif
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($allBlogs as $blog)
                        <div class="col-lg-6">
                            <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                                <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                    <div class="position-relative overflow-hidden">
                                        <img src="{{ asset('uploads/' . $blog->thumbnail) }}" class="img-fluid">
                                        <div class="card-overlay"></div>
                                        {{-- Action Dropdown  --}}
                                        <div class="dropdown dropstart position-absolute"
                                            style="top: 1rem; right: 1rem;">
                                            <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <ul class="dropdown-menu">
                                                @auth
                                                    @if (auth()->user()->id === $blog->user_id)
                                                        <li class="mb-1">
                                                            <a class="btn btn-sm btn-icon btn-warning"
                                                                href="{{ route('blog.edit', $blog->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-title="Edit">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                        </li>
                                                        <li class="mb-1">
                                                            <form action="{{ route('blog.destroy', $blog->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-icon btn-danger"
                                                                    data-bs-toggle="tooltip" data-bs-title="Move to trash">
                                                                    <i class="fa-regular fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                @endauth
                                                <li class="mb-1">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-icon btn-light"
                                                            data-bs-toggle="tooltip" data-bs-title="Save">
                                                            <i class="fa-solid fa-heart-circle-plus"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class="mb-1">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-icon btn-light"
                                                            data-bs-toggle="tooltip" data-bs-title="Share">
                                                            <i class="fa-regular fa-share-from-square"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- Action Dropdown  --}}
                                    </div>
                                </div>

                                <div class="card-body blog-content position-relative p-0">
                                    <div class="blog-tag px-4">
                                        @foreach ($blog->blogcategories as $category)
                                            <a href="#"
                                                class="badge bg-primary rounded-pill">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="p-4">
                                        <ul class="list-unstyled text-muted small mb-2">
                                            <li class="d-inline-flex align-items-center me-2">
                                                <i class="fa-regular fa-calendar fea icon-ex-sm me-1 text-dark"></i>
                                                {{ $blog->created_at->format('d F Y') }}
                                            </li>
                                            <li class="d-inline-flex align-items-center">
                                                <i class="fa-regular fa-clock fea icon-ex-sm me-1 text-dark"></i>
                                                {{ $blog->read_time }} mins read
                                            </li>
                                        </ul>

                                        <a href="{{ route('blog.show', $blog->id) }}"
                                            class="title fw-semibold fs-5 text-dark">
                                            {{ $blog->title }}
                                        </a>

                                        <ul class="d-flex justify-content-between align-items-center mb-0 mt-3">
                                            <li class="list-inline-item me-2">
                                                <a href="{{ route('blog.show', $blog->id) }}"
                                                    class="btn btn-link primary text-dark">Read Now
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-dark">By</span>
                                                <a href="{{ route('user.profile', $blog->user->id) }}"
                                                    class="text-muted link-title">
                                                    {{ $blog->user->name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (auth()->user()->id == request()->route()->id)
                    <a href="route('blog.create')" class="btn btn-primary">Add New Blog</a>
                @endif
            </div>
        </div>
    </div>
</div>
