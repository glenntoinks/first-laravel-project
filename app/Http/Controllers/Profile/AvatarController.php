<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        // specific input
        // dd($request->input('_token'));

        // all input
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);

        // return redirect(route('profile.edit'));
        return back()->with('message', 'Avatar successfully changed.');
    }
}
