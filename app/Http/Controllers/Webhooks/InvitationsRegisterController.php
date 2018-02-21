<?php

namespace Genusshaus\Http\Controllers\Webhooks;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Webhooks\InvitationsJoinRequest;
use Genusshaus\Http\Requests\Webhooks\InvitationsRegisterRequest;
use Genusshaus\Http\Requests\Webhooks\InvitationsStorePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InvitationsRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(InvitationsRegisterRequest $request)
    {
        $user = User::where('email', $request->user)->first();

        if ($user->active) {
            return redirect()->route('users.dashboard.index');
        }

        return view('app.webhooks.invitations.index', compact('user'));
    }


    public function join(InvitationsJoinRequest $request)
    {
        $user = User::where('email', $request->user)->first();


        if ($user->active) {
            return redirect()->route('users.dashboard.index');
        }

        return view('app.webhooks.invitations.index', compact('user'));
    }



    public function store(InvitationsStorePasswordRequest $request, User $user)
    {
        if (!$user->active) {
            $user->password = Hash::make($request->password);
            $user->setRememberToken(Str::random(60));

            $user->active = true;

            $user->save();

            event(new PasswordReset($user));
        }

        return redirect()->route('users.dashboard.index');
    }
}
