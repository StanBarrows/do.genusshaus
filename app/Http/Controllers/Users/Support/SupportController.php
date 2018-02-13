<?php

namespace Genusshaus\Http\Controllers\Users\Support;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Users\Support\SendSupportRequest;
use GuzzleHttp\Client;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $places = Place::where('user_id', auth()->user()->id)->where('active', true)->get();

        return view('app.users.support.index', compact('places'));
    }

    public function store(SendSupportRequest $request)
    {
        try {
            $place = Place::find($request->place_id);

            $title = 'Supportanfrage Genusshaus';

            $client = new Client(['headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/json']]);

            $response = $client->request('POST', config('services.erp_smartgate.url'), [
                'form_params' => [
                    'auth_key' => config('services.erp_smartgate.auth_key'),

                    'tags' => ['genusshaus', 'support', 'backend'],

                    'title' => $title,

                    'body' => $request->body,

                    'name'  => $request->user()->name,
                    'email' => $request->user()->email,

                    'company' => $place->name,
                ],
            ]);
        } catch (\Exception $exception) {
        }

        return redirect()->back();
    }
}
