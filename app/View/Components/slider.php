<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class slider extends Component
{
    public $active;

    public function __construct($active = 'dashboard')
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
