<label class="form-label">{{ $label }}</label>
<select class="form-control selectpicker show-tick" id="{{ $name }}" name="{{ $name }}"
        data-live-search="true" title="Pilih {{ $label }}">
    @forelse($options as $option)
        <option value="{{ $option->id }}" {{$option->id == $value ? 'selected' : ''}}>
            {{ $option->name }}
        </option>
    @empty
        {!! $slot !!}
    @endforelse
</select>
@error($name)
<em>{{ $message  }}</em>
@enderror