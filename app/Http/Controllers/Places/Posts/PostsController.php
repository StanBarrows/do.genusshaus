<?php

namespace Genusshaus\Http\Controllers\Places\Posts;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Posts\StorePostsRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    public function index()
    {
        return view('app.places.posts.index');
    }

    public function store(StorePostsRequest $request)
    {
        /* EDIT */
        $place = Place::first();

        $post = $place->posts()->create([
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
            'finish'      => $request->finish,

        ]);

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $post->uploadcares()->create([
            'uploadcareable_id' => $event->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();

        dd('succes');
    }
}
