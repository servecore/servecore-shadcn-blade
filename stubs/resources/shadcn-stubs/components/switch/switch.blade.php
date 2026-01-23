<div x-data="{ on: {{ $checked ? 'true' : 'false' }} }" data-slot="switch-wrapper" class="inline-flex items-center">

    @if ($name)
        <input type="hidden" name="{{ $name }}" x-model="on" :value="on ? '{{ $value }}' : ''">
    @endif

    {{-- Switch --}}
    <button type="button" @click="if (!{{ $disabled ? 'true' : 'false' }}) on = !on" role="switch" :aria-checked="on"
        :data-state="on ? 'checked' : 'unchecked'" data-slot="switch" {{ $disabled ? 'disabled' : '' }}
        class="{{ $classes }}">
        {{-- Thumb --}}
        <span data-slot="switch-thumb" :data-state="on ? 'checked' : 'unchecked'"
            class="bg-background 
                   dark:data-[state=unchecked]:bg-foreground 
                   dark:data-[state=checked]:bg-primary-foreground 
                   pointer-events-none block size-4 rounded-full ring-0 
                   transition-transform 
                   data-[state=checked]:translate-x-[calc(100%-2px)] 
                   data-[state=unchecked]:translate-x-0"></span>
    </button>
</div>
