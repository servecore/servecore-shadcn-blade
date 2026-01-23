<?php

namespace ServeCore\Components;

use Illuminate\View\Component;

class SwitchToggle extends Component
{
    public bool $checked;
    public bool $disabled;
    public ?string $name;
    public string $value;

    public function __construct(
        bool $checked = false,
        bool $disabled = false,
        ?string $name = null,
        string $value = '1'
    ) {
        $this->checked = $checked;
        $this->disabled = $disabled;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.switch.switch')->with([
            'classes' => $this->classes(),
            'checked' => $this->checked,
            'disabled' => $this->disabled,
            'name' => $this->name,
            'value' => $this->value,
        ]);
    }

    public function classes(): string
    {
        return 'peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-input focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent shadow-xs transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50';
    }
}
