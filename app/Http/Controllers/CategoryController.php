<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category):View {
        $posts = $category->posts()->paginate(10);

        return view('category.show', [
            'category'  => $category,
            'posts'     => $posts,
        ]);
    }
}
