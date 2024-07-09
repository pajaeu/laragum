<?php

namespace App\View\Components\Admin\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Column extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'td'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.admin.table.column');
    }
}
