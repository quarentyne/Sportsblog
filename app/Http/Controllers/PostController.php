<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File as FileValidation;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View {
        return view('post.index');
    }

    public function create(): View {
        $categories = Category::all();

        return view('post.create', [
            'categories'    => $categories,
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $validatedData = $request->validate([
            'title'        => ['required', 'min:2', 'max:254'],
            'body'         => ['required', 'min:2'],
            'image'        => [FileValidation::image()],
            'category_id'  => ['required', 'min:1'],
        ]);

        $file = $request->file('image');
        $path = $file->storeAs('posts', $file->hashName(), 'public_images');

        $data = [
            'title'         => $validatedData['title'],
            'body'          => Str::trim($validatedData['body']),
            'image'         => $path,
            'category_id'   => $validatedData['category_id'],
            'user_id'       => $request->user()->id,
        ];

        $post = Post::create($data);

        $tags = Str::of($request->tags)->split('/[\s,]+/');
        foreach ($tags as $tag) {
            $tagName = Str::lower(Str::trim($tag));

            $post->tag($tagName);
        }

        return redirect()->route('posts');
    }

//    public function destroy($post): RedirectResponse {
//
//    }
}
