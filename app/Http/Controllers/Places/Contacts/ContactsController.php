<?php

namespace Genusshaus\Http\Controllers\Places\Contacts;

use Genusshaus\App\Controllers\Controller;

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
}
