@section('title', 'Categories management')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0 me-5">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <style>
                .text-muted {
                    text-align: center;
                    font-weight: normal !important;
                    padding-top: 10%;
                }
            </style>

            <div class="row shadow-lg p-5 m-3 me-5 w-100 rounder">
                <div class="d-flex justify-content-between align-items-center">
                    <form action="{{ route('category.store') }}" method="POST" class="col-5 pe-5" autocomplete="off">
                        @csrf
                        <h4>Create a new Category</h4>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="hidden" name="created_by" id="created_by" value="{{ auth()->user()->id }}">
                                <label for="name" class="form-label">Category name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">create</button>
                            </div>
                        </div>
                    </form>

                    <div class="d-flex col-7">
                        <a href="#categories" class="col-6 dashboard-card shadow-lg">
                            <div>
                                <h5>Categories</h5>
                                <span>{{ count($all_categories) }}</span>
                            </div>
                            <i class="fa-solid fa-list"></i>
                        </a>

                        <a href="#subcategories" class="col-6 dashboard-card shadow-lg ms-3">
                            <div>
                                <h5>Sub-categories</h5>
                                <span>{{ count($all_subcategories) }}</span>
                            </div>
                            <i class="fa-solid fa-layer-group"></i>
                        </a>
                    </div>
                </div>

                {{-- Categories table starts here --}}
                <div class="col-12 my-table mt-5" id="categories">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>All categories</h3>
                        <a href="{{ route('trash.category') }}" class="btn btn-sm btn-light">Trash Can <i
                                class="fa-solid fa-trash-can"></i> </a>
                    </div>
                    <div class="table-head row g-0">
                        <div class="th col-2"><b>#</b></div>
                        <div class="th col-5"><b>Name</b></div>
                        <div class="th col-5"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        <?php $i = 1; ?>
                        @if (!empty($categories))
                            @if (count($categories) > 0)
                                @foreach ($categories as $cat)
                                    <!-- Category Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="delete{{ $cat->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $cat->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{ $cat->id }}Label">
                                                        Confirmation
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this category?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('category.destroy', $cat->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Delete Confirm Modal ends here -->

                                    <div class="table-data row align-items-center g-0">
                                        <div class="td col-2">
                                            <p>{{ $cat->id }}.</p>
                                        </div>
                                        <div class="td col-5">
                                            <p>{{ $cat->name }}</p>
                                        </div>
                                        <div class="td col-5">
                                            <div class="d-flex">
                                                <a data-bs-toggle="collapse" data-bs-target="#sub{{ $cat->id }}"
                                                    aria-expanded="true" aria-controls="sub{{ $cat->id }}"
                                                    class="btn btn-sm btn-primary me-1"><i class="fa-solid fa-plus"></i></a>
                                                <a data-bs-toggle="collapse" data-bs-target="#cat_edit{{ $cat->id }}"
                                                    aria-expanded="true" aria-controls="cat_edit{{ $cat->id }}"
                                                    class="btn btn-sm btn-warning me-1"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $cat->id }}"
                                                    class="btn btn-sm btn-danger"><i
                                                        class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </div>

                                        {{-- Sub-category create form starts here --}}
                                        <div id="sub{{ $cat->id }}" class="accordion-collapse collapse">
                                            <div class="accordion-body">
                                                <form action="{{ route('subcategory.store', $cat->id) }}" method="POST"
                                                    class="col-12 needs-validation" novalidate autocomplete="off">
                                                    @csrf
                                                    <div class="col-12 row align-items-center">
                                                        <input type="hidden" name="created_by" id="updated_by"
                                                            value="{{ auth()->user()->id }}">
                                                        <label for="name" class="form-label col-4 m-0">Sub-category
                                                            name</label>
                                                        <input type="text"
                                                            class="form-control col-5 @error('name') is-invalid @enderror"
                                                            id="name" name="name" required>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <div class="col-2">
                                                            <button class="btn btn-primary" type="submit">create</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- Sub-category create form ends here --}}

                                        {{-- Category edit form starts here --}}
                                        <div id="cat_edit{{ $cat->id }}" class="accordion-collapse collapse">
                                            <div class="accordion-body">
                                                <form action="{{ route('category.update', $cat->id) }}" method="POST"
                                                    class="col-12 needs-validation" novalidate autocomplete="off">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-12 row align-items-center">
                                                        <input type="hidden" name="updated_by" id="updated_by"
                                                            value="{{ auth()->user()->id }}">
                                                        <label for="name" class="form-label col-4 m-0">Edit
                                                            category</label>
                                                        <input type="text"
                                                            class="form-control col-5 @error('name') is-invalid @enderror"
                                                            id="name" name="name" value="{{ $cat->name }}"
                                                            required>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <div class="col-2">
                                                            <button class="btn btn-primary" type="submit">create</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- Category edit form ends here --}}

                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <h4 class="text-muted">No category available</h4>
                            @endif
                        @endif
                    </div>
                    {{ $categories->links() }}
                </div>
                {{-- Categories table ends here --}}
            </div>

            <div class="row shadow-lg p-5 m-3 w-100 rounder">
                {{-- Sub-categories table starts here --}}
                <div class="col-12 my-table" id="subcategories">
                    <h3>Sub-categories</h3>
                    <div class="table-head row g-0">
                        <div class="th col-1"><b>#</b></div>
                        <div class="th col-4"><b>Name</b></div>
                        <div class="th col-4"><b>Parent category</b></div>
                        <div class="th col-3"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        <?php $i = 1; ?>
                        @if (!empty($subcategories))
                            @if (count($subcategories) > 0)
                                @foreach ($subcategories as $cat)
                                    <!-- Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="subdelete{{ $cat->id }}" tabindex="-1"
                                        aria-labelledby="subdelete{{ $cat->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="subdelete{{ $cat->id }}Label">
                                                        Confirmation
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this sub-category?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('subcategory.destroy', $cat->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Confirm Modal ends here -->

                                    <div class="table-data row align-items-center g-0">
                                        <div class="td col-1">
                                            <p><?php echo $i; ?>.</p>
                                        </div>
                                        <div class="td col-4">
                                            <p>{{ $cat->name }}</p>
                                        </div>
                                        <div class="td col-4">
                                            <p>{{ $cat->category->name ?? '' }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <div class="d-flex">
                                                <a data-bs-toggle="collapse"
                                                    data-bs-target="#subcat_edit{{ $cat->id }}" aria-expanded="true"
                                                    aria-controls="subcat_edit{{ $cat->id }}"
                                                    class="btn btn-warning me-1"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#subdelete{{ $cat->id }}"
                                                    class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </div>

                                        {{-- Sub-category edit form starts here --}}
                                        <div id="subcat_edit{{ $cat->id }}" class="accordion-collapse collapse">
                                            <div class="accordion-body">
                                                <form action="{{ route('subcategory.update', $cat->id) }}" method="POST"
                                                    class="col-12 needs-validation" novalidate autocomplete="off">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="updated_by" id="updated_by"
                                                        value="{{ auth()->user()->id }}">

                                                    <div class="col-12 row align-items-center">
                                                        <label for="name" class="form-label col-4 m-0">Edit
                                                            sub-category:</label>
                                                        <input type="text"
                                                            class="form-control col-8 @error('name') is-invalid @enderror"
                                                            id="name" name="name" value="{{ $cat->name }}"
                                                            required>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 row align-items-center">
                                                        <label for="category" class="form-label col-4 m-0">Select
                                                            category:</label>
                                                        <select class="form-select w-50" id="category" name="category">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if ($category->id == $cat->category_id) selected @endif>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="col-2">
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- Sub-category edit form ends here --}}

                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <h4 class="text-muted">No sub-category available</h4>
                            @endif
                        @endif
                    </div>
                    {{ $subcategories->links() }}
                </div>
                {{-- Sub-categories table ends here --}}
            </div>
        </div>
    </div>
@endsection
