<form method="POST" action="{{ $action }}">
    @csrf
    @method('POST')
    <button {{ $attributes->merge(['type' => 'submit']) }} class="{{ $class }}">
        {{ $slot }}
    </button>
</form>
