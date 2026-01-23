<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public int $delay;

    public function __construct(int $delay = 0)
    {
        $this->delay = $delay;
    }

    public function render()
    {
        return view('components.avatar.avatar', [
            'classes' => $this->classes(),
            'config' => json_encode(['delay' => $this->delay]),
        ]);
    }

    public function classes(): string
    {
        return 'relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full';
    }
}
