@section('title', 'Categories Trash Can')
@extends('layout.trash-can')
@section('table')
    <h3>Categories</h3>
    <div class="table-head row g-0">
        <div class="th col-2"><b>#</b></div>
        <div class="th col-3"><b>Name</b></div>
        <div class="th col-4"><b>Deleted At</b></div>
        <div class="th col-3"><b>Actions</b></div>
    </div>
    <div class="table-body">
        <?php $i = 1; ?>
        @if (!empty($categories))
            @if (count($categories) > 0)
                @foreach ($categories as $cat)
                    <!-- Category Restore Confirm Modal starts here -->
                    <div class="modal fade" id="restore{{ $cat->id }}" tabindex="-1"
                        aria-labelledby="restore{{ $cat->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="restore{{ $cat->id }}Label">
                                        Confirmation
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to restore this category?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('category.restore', $cat->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Restore Confirm Modal ends here -->

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
                                    <form action="{{ route('category.delete', $cat->id) }}" method="POST">
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
                            <p>{{ $i }}.</p>
                        </div>
                        <div class="td col-3">
                            <p>{{ $cat->name }}</p>
                        </div>
                        <div class="td col-4">
                            <p>{{ $cat->deleted_at->format('d-M-y / H:m:s') }}</p>
                        </div>
                        <div class="td col-3">
                            <div class="d-flex">
                                <a data-bs-toggle="modal" data-bs-target="#restore{{ $cat->id }}"
                                    class="btn btn-primary me-1"><i class="fa-solid fa-refresh"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $cat->id }}"
                                    class="btn btn-primary"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            @else
                <h4 class="text-muted">No category available</h4>
            @endif
        @endif
    </div>
@endsection
