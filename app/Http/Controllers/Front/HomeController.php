<?php

namespace App\Http\Controllers\Front;

use Illuminate\Contracts\View\View;

class HomeController
{

    public function __invoke(): View
    {
        return view('front.home');
    }
}