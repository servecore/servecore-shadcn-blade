<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Alert extends Component
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
        return view('components.alert.alert')->with('classes', $this->classes());
    }

    public function classes(): string
    {
        $classes = [
            'relative w-full rounded-lg border [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground',
        ];

        // Theme
        if ($this->theme === 'default') {
            $classes[] = 'p-4';
        } elseif ($this->theme === 'New York') {
            $classes[] = 'px-4 py-3 text-sm';
        }

        // Variants
        $variants = [
            'default' => 'bg-background text-foreground',
            'destructive' => 'border-destructive/50 text-destructive [&>svg]:text-destructive',
        ];

        if (isset($variants[$this->variant])) {
            $classes[] = $variants[$this->variant];
        }

        return implode(' ', $classes);
    }
}
