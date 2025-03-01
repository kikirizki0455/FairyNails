<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
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
