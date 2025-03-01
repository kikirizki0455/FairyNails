<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LazyImage extends Component
{
    public $src;
    public $alt;
    public $class;
    
    public function __construct($src, $alt, $class)
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.lazyImage');
    }
}
