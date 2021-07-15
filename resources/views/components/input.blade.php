<label class="form-label">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
    class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">
@error($name)
    <em class="text-danger">{{ $message }}</em>
@enderror
