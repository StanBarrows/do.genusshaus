<?php

namespace Genusshaus\Http\Controllers\Places\Contacts;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Contacts\StoreContactsRequest;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        return view('app.places.contacts.index', compact('place'));
    }

    public function update(StoreContactsRequest $request, Place $place)
    {
        $place->contact()->update([

            'name'      => $request->name,
            'email'     => $request->email,
            'web'       => $request->web,
            'phone'     => $request->phone,
            'facebook'  => $request->facebook,
            'instagram' => $request->instagram,
            'twitter'   => $request->twitter,

        ]);

        return back();
    }
}
