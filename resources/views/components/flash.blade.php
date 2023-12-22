@if (session()->has('message'))
    <div class="position-fixed top-50 end-0 p-3" style="z-index: 5">
        <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">{{ session('message') }}</strong>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @if (session()->has('messageBody'))
                    {{ session()->get('messageBody') }}
                @endif
            </div>
        </div>
    </div>
@endif
