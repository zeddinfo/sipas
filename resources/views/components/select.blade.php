<label class="form-label">{{ $label }}</label>
<select class="form-control selectpicker show-tick" id="{{ $name }}" name="{{ $name }}"
    data-live-search="true" title="Pilih {{ $label }}">
    @forelse($options as $option)
        <option value="{{ $option->{$field ?? 'id'} }}"
            {{ isset($value) && $option->{$field ?? 'id'} == $value ? 'selected' : '' }}>
            {{ $option->{$field ?? 'name'} }}
        </option>
    @empty
        {!! $slot !!}
    @endforelse
</select>
@error($name)
    <em>{{ $message }}</em>
@enderror
