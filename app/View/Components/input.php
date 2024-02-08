<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $name;
    public $label;
    public $placeholder;
    public $value;
    
    public function __construct($type,$name,$label=null,$placeholder=null,$value=null)
    {
        $this->type=$type;
        $this->name=$name;
        $this->label=$label;
        $this->placeholder=$placeholder;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
