<?php

namespace Genusshaus\Http\Controllers\Places\Posts;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Post;
use Genusshaus\Http\Requests\Places\Posts\StorePostsRequest;
use Genusshaus\Http\Requests\Places\Posts\UpdatePostsRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        $posts = $place->posts()->orderBy('created_at','desc')->get();

        return view('app.places.posts.index',compact('place','posts'));
    }

    public function create(Place $place)
    {
        return view('app.places.posts.create',compact('place'));
    }

    public function edit(Place $place, Post $post)
    {
        return view('app.places.posts.edit',compact('place','post'));
    }

    public function store(StorePostsRequest $request, Place $place)
    {
        $post = $place->posts()->create([
            'title'        => $request->title,
            'teaser'       => $request->teaser,
            'body'         => $request->body,
            'author'       => $request->author,
            'src'          => $request->src,

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



    public function update(UpdatePostsRequest $request, Place $place, Post $post)
    {
       $post->update([
            'title'        => $request->title,
            'teaser'       => $request->teaser,
            'body'         => $request->body,
            'author'       => $request->author,
            'src'          => $request->src,

        ]);

        return back();
    }



    public function publish(Place $place, Post $post)
    {
        $post->published = true;
        $post->save();

        return back();
    }


    public function unpublish(Place $place, Post $post)
    {
        $post->published = false;
        $post->save();

        return back();
    }



    public function delete(Place $place, Post $post)
    {
        $post->published = false;
        $post->pushed = false;

        $post->save();

        $post->delete();

        return redirect()->route('places.posts.index', compact('place'));
    }

}
