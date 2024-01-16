@props([
    'name',
    'disabled' => false,
    'options' => [],
    'selected' => null,
    'default' => null,
    'field' => null,
    'parent' => null,
])
<select name="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->class(['form-control form-select rounded border-light bg-light', 'is-invalid' => $errors->has($name)]) }}>
    @foreach ($options as $value)
        @if ($parent)
            <option value="{{ $value->id }}" @selected($selected == $value->id || $default == $value->id)>
                {{ $value->{$field} ?? $value->name }} ({{ $value->{$parent}?->name }})
            </option>
        @else
            <option value="{{ $value->id }}" @selected($selected == $value->id || $default == $value->id)>
                {{ $value->{$field} ?? $value->name }}
            </option>
        @endif
    @endforeach

</select>

@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
