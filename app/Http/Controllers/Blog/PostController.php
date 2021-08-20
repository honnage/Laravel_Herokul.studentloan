<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){
        return view('blog.category')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('category',$category)
        ->with('posts',$category->posts()->paginate(3));
    }

public function tag(Tag $tag){
        return view('blog.tag')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('tag',$tag)
        ->with('posts',$tag->posts()->paginate(3));
    }
    
}
    
