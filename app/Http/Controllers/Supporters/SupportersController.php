<?php

namespace Genusshaus\Http\Controllers\Supporters;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;
use Genusshaus\Http\Requests\Supporters\StartImpersonateRequest;

class SupportersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:supporter'], ['except' => ['destroy']]);
    }

    public function index()
    {
        return view('app.supporters.index');
    }

    public function store(StartImpersonateRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        session()->put('impersonate', $user->id);

        return redirect('/');
    }

    public function destroy()
    {
        session()->forget('impersonate');

        return redirect('/');
    }
}
