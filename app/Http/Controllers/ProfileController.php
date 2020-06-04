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

        DB::table('users')
        ->where('users.id','=',$profiles->user_id )
        ->update([
        'detail' => 1,
        ]);


        return redirect('/home');
    }

    public function edit($id)
    {
        $id = Auth::user()->id;

        $profiles = DB::table('profiles')
                    ->where('profiles.user_id','=',$id)
                    ->get();
        return view('Profiles.edit',compact('profiles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'IdentificationCode' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'birthdate'=>'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        DB::table('profiles')
        ->where('user_id','=',$id)
        ->update([
        'IdentificationCode' => $request->IdentificationCode,
        'fname' => $request->fname,
        'lname' => $request->lname,
        'birthdate' => $request->birthdate,
        'gender' => $request->gender,
        'email' => $request->email,
        'address' => $request->address,
    ]);
    return redirect('/home');
    }

    public function dashboard(){

        $Profiles = DB::table('profiles')
        // ->join('accounts','accounts.profile_id','=','profiles.user_id')
        // ->select('*','profiles.id as ProfileID',DB::raw('sum(accounts.TuitionFee + accounts.Other + accounts.cost_living) as total'))
        // ->where('profiles.user_id' ,'=','Accounts.profile_id')
        ->groupBy('profiles.id')
        ->orderBy('profiles.user_id', 'DESC')
        ->get();
        return view('Profiles.dashboard',compact('Profiles'));
    }

    public function dashboardUser(){
        $users = DB::table('users')
        ->select('*',)
        ->orderBy('users.id', 'DESC')
        ->get();
        return view('Profiles.dashboardUser',compact('users'));
    }


}
