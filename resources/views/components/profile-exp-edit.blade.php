<div class="modal fade" id="expEdit{{ $experience->id }}" tabindex="-1" aria-labelledby="expEdit{{ $experience->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px !important">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="expEdit{{ $experience->id }}Label">Edit your experience</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('experience.update', $experience->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold" for="job_title">Job
                                Title</label>
                            <input type="text"
                                class="form-control enable-disable @error('job_title') is-invalid @enderror"
                                name="job_title" id="job_title" placeholder="Name of the job"
                                value="{{ $experience->job_title }}">
                            @error('job_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold" for="company_name">Company
                                Name</label>
                            <input type="text"
                                class="form-control enable-disable @error('company_name') is-invalid @enderror"
                                name="company_name" id="company_name" placeholder="Company you worked for"
                                value="{{ $experience->company_name }}">
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold" for="location">Company's
                                Location</label>
                            <input type="text"
                                class="form-control enable-disable @error('location') is-invalid @enderror"
                                name="location" id="location" placeholder="Location of your company"
                                value="{{ $experience->location }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold" for="start_date">Start
                                Date</label>
                            <input type="date"
                                class="form-control enable-disable @error('start_date') is-invalid @enderror"
                                name="start_date" id="start_date" value="{{ $experience->start_date }}">
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold" for="end_date">End
                                Date</label>
                            <input type="date"
                                class="form-control enable-disable @error('end_date') is-invalid @enderror"
                                name="end_date" id="end_date" value="{{ $experience->end_date }}">
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold" for="description">
                                Responsibilies & Achievements
                            </label>
                            <textarea class="form-control enable-disable @error('description') is-invalid @enderror" name="description"
                                id="description" rows="5" placeholder="Describe your job">{{ $experience->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Add Experience">
                </div>
            </form>
        </div>
    </div>
</div>
