<?php

namespace Genusshaus\Http\Controllers\Users\Profile;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Users\Profile\UpdatePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = User::find($request->user_id);

        if (!$user->isSameAs(Auth::user())) {
            abort(404);
        }

        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        return redirect()->back();
    }
}
