<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $class, $prefix, $name, $caption, $type, $value, $rows;
    public function __construct(
        $class = null,
        $prefix = null,
        $name = null,
        $caption = null,
        $type = 'text',
        $value = '',
        $rows = 3
    )
    {
        $this->class = $class;
        $this->prefix = $prefix;
        $this->name = $name;
        $this->caption = $caption;
        $this->type = $type;
        $this->value = $value;
        $this->rows = $rows;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
