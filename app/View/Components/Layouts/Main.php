<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Main extends Component
{

    public $subtitle;
    public $sidebar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subtitle, $sidebar)
    {
        $this->subtitle = ucwords($subtitle);
        $this->sidebar  = $sidebar ?? true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}
