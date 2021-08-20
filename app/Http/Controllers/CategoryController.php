<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create(['name'=>$request->name]);
        Session()->flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/categories');
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
        $category = Category::find($id);
        return view('categories.create')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::find($id)->update($request->all());
        Session()->flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว');

        // dd($request->all());
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->posts->count() > 0){
            Session()->flash('error','ไม่สามารถลบได้เนื่องจากมีชื่อบทความใช้งานอยู่');
            return redirect()->back();
        }
        Category::find($id)->delete();
        Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect('/categories');
    }
}
