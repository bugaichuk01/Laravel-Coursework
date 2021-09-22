<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts_count = Post::all()->count();
        $category_count = Category::all()->count();
        return view('admin.home.index' , [
            'posts_count' => $posts_count,
            'category_count' => $category_count,
        ]);
    }
}
