@php
    /* @var Illuminate\View\ComponentAttributeBag $attributes */
    $attributes = $attributes->merge([
        'data-orientation' => $orientation,
        'data-state' => $state,
        'data-disabled' => $disabled ? true : null,
        'x-init' => "set('$id', '$value')",
    ])
    ->class(['border-b']);
@endphp

    <div {{ $attributes }}>
        {{ $slot }}
    </div>
