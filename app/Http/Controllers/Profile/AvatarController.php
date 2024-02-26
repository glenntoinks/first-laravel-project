<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        // specific input
        // dd($request->input('_token'));

        // get file
        // $path = $request->file('avatar')->store('avatars','public');

        // get file
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        // delete old file if user already had an avatar
        if ($oldAvatar = auth()->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path]);

        // return redirect(route('profile.edit'));
        return back()->with('message', 'Avatar successfully changed.');
    }
}
