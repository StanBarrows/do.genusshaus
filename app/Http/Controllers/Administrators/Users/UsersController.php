<?php

namespace Genusshaus\Http\Controllers\Administrators\Users;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Administrators\Users\StoreUsersRequest;
use Genusshaus\Http\Requests\Administrators\Users\UpdateUsersRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Smart6ate\Roles\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:administrator']);
    }

    public function index()
    {
        $users = User::has('roles')->with('roles')->get();

        return view('app.administrators.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('app.administrators.users.create', compact('roles'));
    }

    public function store(StoreUsersRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(Str::random(16));
        $user->active = true;

        $user->setRememberToken(Str::random(60));

        $user->save();

        foreach ($request->roles as $role) {
            $user->roles()->attach($role);
        }

        //if($request->notify) & notify user

        return redirect()->route('administrators.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('app.administrators.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUsersRequest $request, User $user)
    {
        if (!auth()->user()->isSameAs($user)) {
            $user->roles()->detach();

            foreach ($request->roles as $role) {
                $user->roles()->attach($role);
            }
        }

        return redirect()->route('administrators.users.index');
    }

    public function delete(User $user)
    {
        if (!auth()->user()->isSameAs($user)) {
            $user->delete();
        }

        return back();
    }
}
