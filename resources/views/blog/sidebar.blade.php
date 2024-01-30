<style>
    #searchItemform2 .fa-magnifying-glass {
        position: absolute;
        right: 14px;
        top: 14px;
        font-size: 20px;
        line-height: 20px;
        pointer-events: none
    }

    .search-bar .searchform:after {
        display: none !important;
    }
    
</style>

<div class="col-lg-4 col-md-6 col-12">
    <div class="card bg-white p-4 rounded shadow sticky-bar">
        <!-- SEARCH -->
        <div>
            <h6 class="pt-2 pb-2 bg-light rounded text-center">Search</h6>

            <div class="search-bar mt-4">
                <div id="itemSearch2" class="menu-search mb-0">
                    <form role="search" method="get" id="searchItemform2" class="searchform">
                        <input type="text" class="form-control rounded border" name="s" id="searchItem2"
                            placeholder="Search...">
                        <input type="submit" id="searchItemsubmit2" value="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- SEARCH -->

        <!-- RECENT POST -->
        <div class="mt-4 pt-2">
            <h6 class="pt-2 pb-2 bg-light rounded text-center">Recent Blogs</h6>
            <div class="mt-4">
                @foreach ($latestBlogs as $latestBlog)
                    <div class="blog blog-primary d-flex align-items-center">
                        <img src="{{ asset('uploads/' . $latestBlog->thumbnail) }}" class="avatar avatar-small rounded"
                            style="width: auto;">
                        <div class="flex-1 ms-3">
                            <a href="{{ route('blog.show', $latestBlog->id) }}"
                                class="d-block title text-dark fw-medium">
                                {{ $latestBlog->title }}
                            </a>
                            <span class="text-muted small">
                                {{ $latestBlog->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- RECENT POST -->

        <!-- TAG CLOUDS -->
        <div class="mt-4 pt-2 text-center">
            <h6 class="pt-2 pb-2 bg-light rounded">Tags Cloud</h6>
            <ul class="tagcloud list-unstyled mt-4">
                @foreach ($categories as $category)
                    <li class="d-inline-flex m-1">
                        <a href="javascript:void(0)" class="rounded fw-medium text-dark py-1 px-2">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- TAG CLOUDS -->
    </div>
</div><!--end col-->
