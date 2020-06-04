<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $id =  Auth::user()->id ;
        $users = DB::table('users')
        ->where('users.id','=',$id)
        ->get();

        $profiles = DB::table('profiles')
        ->where('profiles.user_id','=',$id)
        ->get();

        $accounts = DB::table('accounts')
        ->where('accounts.profile_id','=',$id)
        ->get();

        return view('home',compact('users','profiles','accounts'));
    }
}
