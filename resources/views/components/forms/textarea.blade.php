@props(['name', 'id', 'value'])

<textarea name="{{ $name }}" id="{{ $name }}" autocomplete="off"
    {{ $attributes->class(['form-control rounded border-light bg-light', 'is-invalid' => $errors->has($name)]) }}>{{ $value }}</textarea>
