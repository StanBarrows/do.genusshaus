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
        return view('app.places.contacts.index');
    }

    public function update(StoreContactsRequest $request, Place $place)
    {
        $contact = $place->contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->web = $request->web;
        $contact->phone = $request->phone;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;

        $contact->save();

        return back();
    }
}
