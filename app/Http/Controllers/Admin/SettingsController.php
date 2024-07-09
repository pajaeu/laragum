<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\UpdateSettingsPasswordRequest;
use App\Http\Requests\Admin\Settings\UpdateSettingsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class SettingsController extends Controller
{

    public function index(): View
    {
        $user = auth()->user();

        return view('admin.settings.index', [
            'user' => $user
        ]);
    }

    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')
                ->store("avatars", 'public');
        }

        $user->update($data);

        return to_route('admin.settings.index')
            ->with('success', 'Settings updated successfully');
    }

    public function password(): View
    {
        return view('admin.settings.password');
    }

    public function updatePassword(UpdateSettingsPasswordRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return to_route('admin.settings.password')
            ->with('success', 'Password updated successfully');
    }
}
