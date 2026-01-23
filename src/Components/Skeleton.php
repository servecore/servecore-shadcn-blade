<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Skeleton extends Component
{
    public function render()
    {
        return view('components.skeleton.skeleton', [
            'classes' => $this->classes(),
        ]);
    }

    public function classes(): string
    {
        return 'bg-accent animate-pulse rounded-md';
    }
}
