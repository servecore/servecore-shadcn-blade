<span {{ $attributes->merge(['x-data' => "avatar($config)"])->class($classes) }}>
    {{ $slot }}
</span>
