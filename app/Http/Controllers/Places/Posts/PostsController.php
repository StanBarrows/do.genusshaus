<?php

namespace Genusshaus\Http\Controllers\Places\Posts;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Posts\StorePostsRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.posts.index');
    }

    public function create()
    {
        return view('app.places.posts.create');
    }

    public function store(StorePostsRequest $request, Place $place)
    {
        $post = $place->posts()->create([
            'title'        => $request->title,
            'teaser' => $request->teaser,
            'body' => $request->body,
            'author' => $request->author,
            'src'       => $request->src,

        ]);

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $post->uploadcares()->create([
            'uploadcareable_id' => $post->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();

        return redirect()->route('places.posts.index', $place);

    }
}
