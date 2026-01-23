<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $theme;

    public function __construct()
    {
        $this->theme = \Illuminate\Support\Facades\View::shared('theme', 'default');
    }

    public function render()
    {
        return view('components.input.input')->with('classes', $this->classes());
    }

    public function classes(): string
    {
        $classes = [
            'flex w-full rounded-md border border-input px-3 text-base file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
        ];

        if ($this->theme === 'default') {
            $classes[] = 'h-10 bg-background py-2 ring-offset-background focus-visible:ring-2 focus-visible:ring-offset-2';
        } elseif ($this->theme === 'New York') {
            $classes[] = 'h-9 bg-transparent py-1 shadow-sm transition-colors focus-visible:ring-1';
        }

        return implode(' ', $classes);
    }
}
