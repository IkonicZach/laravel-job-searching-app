@section('title', 'Companies Trash Can | Jobnova')
@extends('layout.trash-can')
@section('table')
    <h3>Companies</h3>
    <div class="table-head row g-0">
        <div class="th col-2"><b>#</b></div>
        <div class="th col-3"><b>Name</b></div>
        <div class="th col-4"><b>Deleted At</b></div>
        <div class="th col-3"><b>Actions</b></div>
    </div>
    <div class="table-body">
        <?php $i = 1; ?>
        @if (!empty($trashes))
            @if (count($trashes) > 0)
                @foreach ($trashes as $trash)
                    <!-- Company Restore Confirm Modal starts here -->
                    <div class="modal fade" id="restore{{ $trash->id }}" tabindex="-1"
                        aria-labelledby="restore{{ $trash->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="restore{{ $trash->id }}Label">
                                        Confirmation
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to restore this company?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('company-management.restore', $trash->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Company Restore Confirm Modal ends here -->

                    <!-- Company Delete Confirm Modal starts here -->
                    <div class="modal fade" id="delete{{ $trash->id }}" tabindex="-1"
                        aria-labelledby="delete{{ $trash->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="delete{{ $trash->id }}Label">
                                        Confirmation
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this company?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('company-management.delete', $trash->id) }}" method="POST">
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
                    <!-- Company Delete Confirm Modal ends here -->

                    <div class="table-data row align-items-center g-0">
                        <div class="td col-2">
                            <p>{{ $i }}.</p>
                        </div>
                        <div class="td col-3">
                            <p>{{ $trash->name }}</p>
                        </div>
                        <div class="td col-4">
                            <p>{{ $trash->deleted_at->format('d-M-y / H:m:s') }}</p>
                        </div>
                        <div class="td col-3">
                            <div class="d-flex">
                                <a data-bs-toggle="modal" data-bs-target="#restore{{ $trash->id }}"
                                    class="btn btn-primary me-1"><i class="fa-solid fa-refresh"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $trash->id }}"
                                    class="btn btn-primary"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            @else
                <h4 class="text-muted">No company available</h4>
            @endif
        @endif
    </div>
@endsection