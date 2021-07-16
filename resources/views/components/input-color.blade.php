<label class="form-label">{{ $label }}</label>
<input type="color" name="{{ $name }}" value="{{ $value ?? '' }}"
    class="form-control h-50 @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">
@error($name)
    <em class="text-danger">{{ $message }}</em>
@enderror
