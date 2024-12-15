{{-- @if (Session::has('success'))
    <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
        {{ Session::get('error') }}
    </div>
@endif --}}
@if (Session::has('success'))
    <div class="alert alert-success p-3 mb-3 rounded">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger p-3 mb-3 rounded">
        {{ Session::get('error') }}
    </div>
@endif
