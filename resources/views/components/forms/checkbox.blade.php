@props([
    'type' => 'checkbox',
    'name',
    'id',
    'value',
])

<input name="{{ $name }}" class="form-check-input" type="{{ $type }}"
    {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }} id="{{ $id }}"
    @checked(old($name))>
@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
