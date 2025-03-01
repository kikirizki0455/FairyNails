<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mediaSection extends Component
{
    public $image;
    public $icon;
    public $title;
    
    public function __construct($icon=null, $title,$image=null)
    {
        $this->icon =$icon;
        $this->title = $title;
        $this->image= $image;
    }

    public function render(): View|Closure|string
    {
        return view('components.mediaSection');
    }
}
