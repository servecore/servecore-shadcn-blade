<button {{ $attributes->merge([
    'type' => 'button',
    'role' => 'checkbox',
    'aria-checked' => json_encode($checked),
    'aria-required' => $required ? json_encode($required) : null,
    'data-state' => $state,
    'data-disabled' => $disabled ? '' : null,
    'disabled' => $disabled ? '' : null,
    'value' => $value,
    'x-data' => 'checkbox',
])->class($classes) }}>
    <x-checkbox-indicator />
</button>
