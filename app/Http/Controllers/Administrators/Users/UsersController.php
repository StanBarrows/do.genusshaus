<?php

namespace Genusshaus\Http\Controllers\Administrators\Users;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;
use Genusshaus\Http\Requests\Administrators\Users\InviteUsersRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('app.administrators.users.index', compact('users'));
    }

    public function create()
    {
        return view('app.administrators.users.create');
    }

    public function store(InviteUsersRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(Str::random(16));
        $user->active = false;

        $user->setRememberToken(Str::random(60));

        $user->save();

        foreach ($request->roles as $role) {
            $user->roles()->attach($role);
        }

//            if($request->notify)
//            {
//                Notify $user
//            }

        return back();
    }
}
