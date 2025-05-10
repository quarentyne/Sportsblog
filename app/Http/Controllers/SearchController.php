<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $posts = Post::search($request->query('query'))->paginate(10);

        $posts->load(['tags', 'user']);

        return view('category.show', [
            'posts'     => $posts,
        ]);
    }
}
