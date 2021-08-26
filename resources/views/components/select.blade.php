<label class="form-label">{{ $label }}</label>

<select class="form-control selectpicker show-tick" name="{{ $name }}" data-live-search="true"
    title="Pilih {{ $label }}">
    @forelse($options as $option)
        <option value="{{ $option->{$field ?? 'id'} }}" data-subtext="{{ $option?->code }}"
            {{ isset($value) && $option->{$field ?? 'id'} == $value ? 'selected' : '' }}>
            {{ $option->{$field ?? 'name'} }}
        </option>
    @empty
        {!! $slot !!}
    @endforelse
</select>


@error($name)
    <em class="text-danger">{{ $message }}</em>
@enderror

@if ($errors->has($errorName ?? ''))
    <em class="text-danger">{{ $errors->get($errorName)[0] }}</em>
@endif
