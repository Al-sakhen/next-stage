
@if (session()->has('success'))
    <div class="alert alert-success position-absolute">
        {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger position-absolute">
        {{ session()->get('error') }}
    </div>
@endif

