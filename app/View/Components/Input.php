<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $class, $prefix, $name, $caption, $type;
    public function __construct(
        $class = null,
        $prefix = null,
        $name = null,
        $caption = null,
        $type = 'text'
    )
    {
        $this->class = $class;
        $this->prefix = $prefix;
        $this->name = $name;
        $this->caption = $caption;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.input');
    }
}
