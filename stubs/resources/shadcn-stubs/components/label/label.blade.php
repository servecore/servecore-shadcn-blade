<label {{ $attributes->merge(['for' => $for ?? null])->class($classes) }}>
    {{ $slot }}
</label>

