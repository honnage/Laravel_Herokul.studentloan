<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    public function changeAdmin(User $user){
        $user->role='admin';
        $user->save();
        Session()->flash('success','เปลี่ยนแปลงสถานะเป็น Admin เรียบร้อยแล้ว');
        return redirect('/users');
    }

    public function changeUser(User $user){
        $user->role='writer';
        $user->save();
        Session()->flash('success','เปลี่ยนแปลงสถานะเป็น writer เรียบร้อยแล้ว');
        return redirect('/users');
    }
}
