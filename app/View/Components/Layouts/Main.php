<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Main extends Component
{

    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subtitle)
    {
        $this->subtitle = ucwords($subtitle);
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
