<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
// use App\Http\Middleware\VerifyCategory;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('verifyCategory')->only(['create','store']);
    }

    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->image->store('posts');
        // dd($image);
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$image,
            'category_id'=>$request->category,
            'user_id'=>auth()->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags); //เพิ่มข้อมูลไปอีกตารางแบบ array
        }

        Session()->flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.create')
        ->with('posts',$post)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $data = $request->only(['title','description','content']);
      
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            Storage::delete($post->image);
            $data['image'] = $image;
        }
        
        if($request->category){
            $data['category_id']=$request->category;
        }

        if($request->tags){
            $post->tags()->sync($request->tags); //updata data
        }

        Post::find($id)->update($data);
        Session()->flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Post::find($id)->delete();
        $post->tags()->detach($post->post_id);
        Storage::delete($post->image);
        Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect('/posts');
    }
}
