<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $variant;
    public string $theme;

    public function __construct(
        string $variant = 'default'
    ) {
        $this->variant = $variant;
        $this->theme = \Illuminate\Support\Facades\View::shared('theme', 'default');
    }

    public function render()
    {
        return view('components.badge.badge')->with('classes', $this->classes());
    }

    public function classes(): string
    {
        $classes = [
            'inline-flex items-center border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2',
        ];

        // Theme
        if ($this->theme === 'default') {
            $classes[] = 'rounded-full';
        } elseif ($this->theme === 'New York') {
            $classes[] = 'rounded-md shadow';
        }

        // Variants
        $variants = [
            'default' => 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80',
            'destructive' => 'border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80',
            'outline' => 'text-foreground',
            'secondary' => 'border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80',
        ];

        if (isset($variants[$this->variant])) {
            $classes[] = $variants[$this->variant];
        }

        return implode(' ', $classes);
    }
}
