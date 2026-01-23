<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public bool $checked;
    public bool $required;
    public bool $disabled;
    public ?string $value;
    public string $theme;

    public function __construct(
        bool $checked = false,
        bool $required = false,
        bool $disabled = false,
        ?string $value = null
    ) {
        $this->checked = $checked;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->value = $value;
        $this->theme = \Illuminate\Support\Facades\View::shared('theme', 'default');
    }

    public function render()
    {
        $state = $this->checked ? 'checked' : 'unchecked';

        return view('components.checkbox.checkbox')->with([
            'classes' => $this->classes(),
            'checked' => $this->checked,
            'required' => $this->required,
            'disabled' => $this->disabled,
            'value' => $this->value,
            'state' => $state,
        ]);
    }

    public function classes(): string
    {
        $classes = [
            'peer h-4 w-4 shrink-0 rounded-sm border border-primary focus-visible:outline-none focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground',
        ];

        if ($this->theme === 'default') {
            $classes[] = 'ring-offset-background focus-visible:ring-2 focus-visible:ring-offset-2';
        } elseif ($this->theme === 'New York') {
            $classes[] = 'shadow focus-visible:ring-1';
        }

        return implode(' ', $classes);
    }
}
