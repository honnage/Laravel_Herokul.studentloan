<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LoanTypeModel;

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

    public function edit($id){
        $Accounts = DB::table('accounts')
        ->join('profiles','profiles.user_id','=','accounts.profile_id')
        ->join('loan_types','loan_types.id','=','accounts.type_id')
        ->join('send_documents','send_documents.SendDocuments_id','=','accounts.SendDocuments_id')
        ->select('*','accounts.id as AccID','accounts.updated_at as AccountsAt')

        ->orderBy('accounts.id', 'DESC')
        ->where('accounts.SendDocuments_id' ,'=',$id)

        ->get();
        return view('Accounts.edit',compact('Accounts'));
    }

    public function update(Request $request, $id)
    {
        $loan_types = LoanTypeModel::get();

        $request->validate([
            'TuitionFee' => 'required',
            'Other' => 'required',
            'Duration' => 'required',
            'salary' => 'required',
        ]);

        DB::table('accounts')
        ->where('accounts.SendDocuments_id','=',$id)
        ->update([
        'Duration' => $request->Duration,
        'TuitionFee' => $request->TuitionFee,
        'Other' => $request->Other,
        'cost_living' => $request->Duration * $request->salary,

        ]);
        // dd($request);
        return redirect('/Accounts/dashboard');
    }

}
