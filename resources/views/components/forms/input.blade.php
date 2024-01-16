@props([
    'type' => 'text',
    'name',
    'id',
    'value',
])
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
    autocomplete="off"
    {{ $attributes->class(['form-control rounded border-light bg-light', 'is-invalid' => $errors->has($name)]) }}>
@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
