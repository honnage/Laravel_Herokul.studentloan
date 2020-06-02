<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function dashboard(){
        $Accounts = DB::table('accounts')
        ->join('profiles','profiles.user_id','=','accounts.profile_id')
        ->join('loan_types','loan_types.id','=','accounts.type_id')
        ->join('send_documents','send_documents.SendDocuments_id','=','accounts.SendDocuments_id')
        ->select('*','accounts.id as AccID','accounts.updated_at as AccountsAt')

        ->orderBy('accounts.id', 'DESC')
        ->get();
        return view('Accounts.dashboard',compact('Accounts'));
    }
}
