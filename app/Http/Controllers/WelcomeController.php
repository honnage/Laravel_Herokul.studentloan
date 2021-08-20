<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class WelcomeController extends Controller
{
    public function index(){
        $search = request()->query('search');
        if($search){
            $posts = Post::where('title','LIKE',"%{$search}%")->paginate(1);
        }else{
            $posts = Post::paginate(6);
        }

        return view('welcome')
        ->with('categories', Category::all())
        ->with('posts', $posts)
        ->with('tags', Tag::all());
    }
}
