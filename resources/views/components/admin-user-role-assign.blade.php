<div class="modal fade" id="assign{{ $user->id }}" tabindex="-1"
    aria-labelledby="assign{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="assign{{ $user->id }}Label">
                    Assign Role
                </h1>
            </div>
            <div class="modal-body">
                Assign a role to {{ $user->name }}.
            </div>
            <form action="{{ route('user.assign', $user->id) }}" method="POST">
                @csrf
                <select class="form-select" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>