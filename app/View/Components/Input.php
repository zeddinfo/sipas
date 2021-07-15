<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $options;
    public $selectedKey;
    public $multiple;
    public $placeholder;
    public $value;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name = '',
        string $label = '',
        string $placeholder = '',
        $value = null,
        string $type = 'text',
        $options = [],
        $bind = null,
        $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $manyRelation = false
    )
    {
        $this->name         = $name;
        $this->label        = $label;
        $this->options      = $options;
        $this->placeholder      = $placeholder;
        $this->value        = $value;
        $this->type         = $type;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
