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

    public function index()
    {
        $place = current_place();

        return view('app.places.contacts.index', compact('place'));
    }

    public function update(StoreContactsRequest $request)
    {
        $place = current_place();

        $place->update([
            'contact_name'      => $request->name,
            'contact_email'     => $request->email,
            'contact_web'       => $request->web,
            'contact_phone'     => $request->phone,
            'contact_facebook'  => $request->facebook,
            'contact_instagram' => $request->instagram,
            'contact_twitter'   => $request->twitter,
        ]);

        return back();
    }
}
