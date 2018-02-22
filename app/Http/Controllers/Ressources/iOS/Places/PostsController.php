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

        if ($posts->count()) {

            return PostsIndexRessource::collection($posts);
        }

        return response()->json([
        ], 204);

    }

    public function show(ShowPostsRequest $request)
    {
        $post = Post::where('uuid', '=', $request->uuid)->first();

        return new PostsShowRessource($post);
    }
}
