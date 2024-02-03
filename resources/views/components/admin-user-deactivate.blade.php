<div class="modal fade" id="deactivate{{ $user->id }}" tabindex="-1"
    aria-labelledby="deactivate{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header" style="border: none !important">
                <h5 class="modal-title text-center" id="deactivate{{ $user->id }}Label">
                    Deactivation Confirmation
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deactivate this account?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('user-management.deactivate', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
