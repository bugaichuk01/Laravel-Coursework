<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->getRoleNames();
        $posts = Post::filter(request(['search']))->orderBy('created_at', 'desc')->Simplepaginate(6);
        $categories = Category::all();
        return view('home' , [
            'posts' => $posts,
            'categories' => $categories,
            'role' => $role[0]
        ]);
    }

    public function categoryFilter(Category $category) {

        $role = Auth::user()->getRoleNames();
        return view('home', [
            'posts' => $category->posts()->paginate(6),     //->with(['category', 'author'])
            'currentCategory' => $category,
            'categories' => Category::all(),
            'role' => $role[0]
        ]);
    }

    public function postFilter($id) {

        $post = Post::find($id);
        $related = $post->category->posts->except($post->id)->sortByDesc('created_at')->take(6);

        return view('post', [
            'post' => $post,
            'related' => $related
        ]);
    }
}
