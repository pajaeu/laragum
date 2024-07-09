<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUploadButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $accept = 'image/*',
        public ?string $image = null,
        public string $label = 'Upload Image',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.file-upload-button');
    }
}
