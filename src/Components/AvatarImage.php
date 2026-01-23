<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class AvatarImage extends Component
{
    public function render()
    {
        return view('components.avatar.avatar-image', [
            'classes' => $this->classes(),
        ]);
    }

    public function classes(): string
    {
        return 'aspect-square h-full w-full';
    }
}
