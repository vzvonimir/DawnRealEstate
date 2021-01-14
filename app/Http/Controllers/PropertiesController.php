<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;

class PropertiesController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if($search){
            $posts = Post::where('title', 'LIKE', "%{$search}%")->paginate(9);
        }else{
            $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        }
        return view('properties.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {

        return view('properties.show')->with('post', $post)->with('tags', Tag::all());
    }
}
