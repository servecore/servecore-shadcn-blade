<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public function render()
    {
        return view('components.label.label')->with('classes', $this->classes());
    }

    public function classes(): string
    {
        return 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70';
    }
}
