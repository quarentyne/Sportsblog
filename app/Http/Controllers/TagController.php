<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function show(Tag $tag): View {
        $posts = $tag->posts()->paginate(15);

        return view('tag.show', [
            'posts' => $posts,
            'tag'   => $tag,
        ]);
    }
}
