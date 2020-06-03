<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProfileModel;
use App\UserModel;

class UserController extends Controller
{
    public function editStatus($id){
        $data = UserModel::find($id);

        $users = DB::table('users')
        ->join('profiles','profiles.user_id','=','users.id')
        ->select('*','users.id as id','profiles.id as ProID')

        ->where('users.id' ,'=',$id)
        ->get();

        $user = DB::table('users')
        ->where('users.id' ,'=',$id)
        ->get();

        if($data->detail == 0 ){
            return view('Users.editStatus_null',compact('user'));
        }else{
            return view('Users.editStatus',compact('users'));

        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'StatusID'=>'required',
        ]);

        $users = UserModel::find($id);
        $users->StatusID = $request->StatusID;
        $users->save();
        // UserModel::find($id)->update($request->all()); //บันทึกแบบทั้งหมด
        return redirect('/Profiles/dashboardUser');
    }
}
