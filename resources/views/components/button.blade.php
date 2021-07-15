<form method="POST" action="{{ $action }}" class="d-inline">
    @csrf
    @method($method ?? '')
    <button {{ $attributes->merge(['type' => 'submit']) }} class="{{ $class }}">
        {{ $slot }}
    </button>
</form>
