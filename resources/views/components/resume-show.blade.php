{{ $slot }}
<div class="modal fade" id="resumeShow" tabindex="-1" aria-labelledby="resumeShowLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px !important">
        <div class="modal-content p-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Your resume</h4>
                <div>
                    @if (auth()->user()->id == request()->route()->id)
                        <a href="{{ route('resume.create') }}"
                            class="btn btn-light icon-link @if ($user->resumes()->count() >= 3) disabled @endif"><i
                                class="fa-regular fa-plus me-1"></i>New Resume</a>
                        @if (auth()->user()->id == request()->route()->id)
                            <a href="{{ route('resume.trash') }}" class="icon-btn btn-light"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        @endif
                    @endif
                </div>
            </div>
            @if ($user->resumes()->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($user->resumes as $resume)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('resume.show', $resume->id) }}" class="text-primary icon-link"><i
                                    class="fa-regular fa-file"></i>
                                {{ $resume->title }}</a>
                            <div class="d-flex">
                                <a href="{{ route('resume.download', $resume->id) }}"
                                    class="btn btn-primary icon-link fw-normal me-1" style="font-size: 12px !important">
                                    <i class="fa-solid fa-download"></i> Download
                                </a>
                                @if (auth()->user()->id == request()->route()->id)
                                    <form action="{{ route('resume.destroy', $resume->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-btn btn-light">
                                            <i class="fa-solid fa-circle-minus"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
                    <div class="row justify-content-center text-center">
                        <h3 class="text-muted col-12">No resume here</h3>
                        @if (auth()->user()->id == request()->route()->id)
                            <a href="{{ route('resume.create') }}" class="btn btn-primary icon-link col-5"><i
                                    class="fa-regular fa-plus me-1"></i>Make one</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
