<div class="modal fade" id="expAll" tabindex="-1" aria-labelledby="expAllLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px !important">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="expAllLabel">All experiences</h1>
                @if (auth()->user()->id == request()->route()->id)
                    <a href="{{ route('experience.trash', auth()->user()->id) }}" class="btn btn-light icon-link">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Trash Can</span>
                    </a>
                @endif
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($allExperiences as $experience)
                        <div class="col-12 mt-4 d-flex">
                            <div class="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center" style="gap: 0.3rem">
                                        <h5 class="mb-0">{{ $experience->job_title }}</h5>
                                        <small class="text-muted">
                                            ({{ $experience->start_date->format('m/Y') }} -
                                            {{ $experience->end_date->format('m/Y') }})
                                        </small>
                                    </div>
                                    @if (auth()->user()->id == request()->route()->id)
                                        <div class="d-flex align-items-center" style="gap: 0.3rem">
                                            <x-profile-exp-edit :experience="$experience" />

                                            <a class="btn btn-sm btn-warning btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#expEdit{{ $experience->id }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('experience.destroy', $experience->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger btn-icon" data-bs-toggle="tooltip"
                                                    data-bs-title="Move to Trash">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <p class="text-muted">
                                    {{ $experience->company_name }} - {{ $experience->location }}
                                </p>
                                <p class="text-muted mb-0">
                                    {{ $experience->description }}
                                </p>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (auth()->user()->id == request()->route()->id)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#expCreate">Add Experience</button>
                @endif
            </div>
        </div>
    </div>
</div>
