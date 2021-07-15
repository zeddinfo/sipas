<form method="POST" action="{{ $action }}" class="d-inline">
    @csrf
    @method('POST')
    <button {{ $attributes->merge(['type' => 'submit']) }} class="{{ $class }}">
        {{ $slot }}
    </button>
</form>
