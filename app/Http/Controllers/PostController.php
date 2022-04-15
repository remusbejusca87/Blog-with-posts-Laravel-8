<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;




class PostController extends Controller
{
    // as a general rule, inside a controller always try to stick to the classic actions/functions and these are:
    // index, show, create, store, edit, update, destroy.

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }


    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
