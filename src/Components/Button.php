<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;

    public string $size;

    public bool $loading;

    public string $theme;

    public function __construct(
        string $variant = 'default',
        string $size = 'default',
        bool $loading = false
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->loading = $loading;
        $this->theme = \Illuminate\Support\Facades\View::shared('theme', 'default');
    }

    public function render()
    {
        return view('components.button.button')->with('classes', $this->classes());
    }

    public function classes(): string
    {
        $classes = [
            'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0',
        ];

        // Theme specific styles
        if ($this->theme === 'default') {
            $classes[] = 'ring-offset-background focus-visible:ring-2 focus-visible:ring-offset-2 h-10';
        } elseif ($this->theme === 'New York') {
            $classes[] = 'focus-visible:ring-1 shadow h-9';
        }

        // Variants
        $variants = [
            'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
            'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
            'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
            'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
            'ghost' => 'hover:bg-accent hover:text-accent-foreground',
            'link' => 'text-primary underline-offset-4 hover:underline',
        ];

        if (isset($variants[$this->variant])) {
            $classes[] = $variants[$this->variant];
        }

        // Sizes
        $sizes = [
            'default' => 'h-10 px-4 py-2',
            'sm' => 'h-9 rounded-md px-3',
            'lg' => 'h-11 rounded-md px-8',
            'icon' => 'h-10 w-10',
        ];

        if (isset($sizes[$this->size])) {
            $classes[] = $sizes[$this->size];
        }

        return implode(' ', $classes);
    }
}
