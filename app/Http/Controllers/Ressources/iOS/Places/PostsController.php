<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Ressources\Models\Post;
use Genusshaus\Http\Requests\Ressources\iOS\Places\ShowPostsRequest;
use Genusshaus\Http\Resources\iOS\Places\PostsIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\PostsShowRessource;

class PostsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $posts = Post::all();
        return PostsIndexRessource::collection($posts);
    }

    public function show(ShowPostsRequest $request)
    {
        $post = Post::where('uuid', '=',$request->uuid)->get();

        return PostsShowRessource::collection($post);
    }

}
