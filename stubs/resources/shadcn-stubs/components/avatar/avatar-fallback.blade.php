<span {{ $attributes->merge(['x-ref' => 'fallback'])->class($classes) }}>
    {{ $slot }}
</span>
