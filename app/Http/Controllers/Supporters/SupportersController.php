<?php

namespace Genusshaus\Http\Controllers\Supporters;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Supporters\StartImpersonateRequest;

class SupportersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
        $this->middleware(['role:supporter'], ['except' => ['destroy']]);
    }

    public function index()
    {
        return view('app.supporters.index');
    }

    public function store(StartImpersonateRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->roles->isEmpty()) {
            session()->put('impersonate', $user->id);

            return redirect('/');
        }

        return back();
    }

    public function destroy()
    {
        session()->forget('impersonate');

        return redirect()->route('supporters.index');
    }
}
