<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class AvatarFallback extends Component
{
    public int $delay;

    public function __construct(int $delay = 0)
    {
        $this->delay = $delay;
    }

    public function render()
    {
        return view('components.avatar.avatar-fallback', [
            'classes' => $this->classes(),
            'delay' => $this->delay,
        ]);
    }

    public function classes(): string
    {
        $classes = [
            'flex h-full w-full items-center justify-center rounded-full bg-muted',
        ];

        if ($this->delay !== 0) {
            $classes[] = 'hidden';
        }

        return implode(' ', $classes);
    }
}
