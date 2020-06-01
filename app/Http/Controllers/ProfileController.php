<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ProfileModel;

class ProfileController extends Controller
{
    public function create(){
        $profiles = DB::table('profiles')->get();
        return view('Profiles.create',compact('profiles'));
    }

    public function store(Request $request){
        $profiles = new ProfileModel;

        $request->validate([
            'IdentificationCode'=>'required',
            'fname'=>'required',
            'lname'=>'required',
            'birthdate'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            // 'email'=>'required',
            'address'=>'required',
        ]);

        $profiles->user_id = Auth::user()->id;
        $profiles->IdentificationCode = $request->IdentificationCode;
        $profiles->fname = $request->fname;
        $profiles->lname = $request->lname;
        $profiles->birthdate = $request->birthdate;
        $profiles->gender = $request->gender;
        $profiles->phone = $request->phone;
        $profiles->email = Auth::user()->email;
        $profiles->address = $request->address;
        $profiles->save();

        return redirect('/home');
    }
}
