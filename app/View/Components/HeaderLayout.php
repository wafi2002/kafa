<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderLayout extends Component
{
    public array $navItems;

    public function __construct(array $navItems = [])
    {
        $this->navItems = $navItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-layout');
    }
}
