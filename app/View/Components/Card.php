<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $icon;
    public $title;
    public $description;
    public $image;
    
    public function __construct($icon=null, $title, $description,$image=null)
    {
        $this->icon =$icon;
        $this->title = $title;
        $this->description = $description;
        $this->image= $image;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
