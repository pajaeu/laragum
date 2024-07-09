<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{

    public function __invoke(User $user): View
    {
        return view('front.profile', [
            'user' => $user,
        ]);
    }
}
