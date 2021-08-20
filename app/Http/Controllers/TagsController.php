<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\CreateTagsRequest;
use App\Http\Requests\UpdateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagsRequest $request)
    {
        Tag::create(['name'=>$request->name]);
        Session()->flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/tags');
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
        $tag = Tag::find($id);
        return view('tags.create')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Tag::find($id)->update($request->all());
        Session()->flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if($tag->posts->count() > 0){
            Session()->flash('error','ไม่สามารถลบได้เนื่องจากมีชื่อบทความใช้งานอยู่');
            return redirect()->back();
        }
        Tag::find($id)->delete();
        Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect('/tags');
    }
}
