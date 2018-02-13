<?php

namespace Genusshaus\Http\Controllers\Users\Profile;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;
use Genusshaus\Http\Requests\Users\Profile\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $user = Auth()->user();

        return view('app.users.profile.index', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::find($request->user_id);

        if (!$user->isSameAs(Auth::user())) {
            abort(404);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back();
    }
}
