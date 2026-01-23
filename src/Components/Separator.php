<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Separator extends Component
{
    public string $orientation;

    public function __construct(string $orientation = 'horizontal')
    {
        $this->orientation = $orientation;
    }

    public function render()
    {
        return view('components.separator.separator', [
            'classes' => $this->classes(),
        ]);
    }

    public function classes(): string
    {
        $classes = [
            'shrink-0 bg-border',
        ];

        if ($this->orientation === 'horizontal') {
            $classes[] = 'h-[1px] w-full';
        } else {
            $classes[] = 'h-full w-[1px]';
        }

        return implode(' ', $classes);
    }
}
