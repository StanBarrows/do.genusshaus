<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Tags;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        $tags = $place->tags;

        return view('app.moderators.places.tags.index', compact('place', 'tags'));
    }

    public function update(Request $request, Place $place)
    {
        foreach ($place->tags as $tag) {
            $place->detachTag($tag->name);
        }

        if ($place->tags) {
            foreach ($request->tags as $tag) {
                if (Tag::find($tag)) {
                    $existingTag = Tag::find($tag);
                    $place->attachTag($existingTag);
                } else {
                    $newTag = Tag::findOrCreate($tag);
                    $newTag->save();
                    $place->attachTag($newTag);
                }
            }
        }

        return back();
    }
}
