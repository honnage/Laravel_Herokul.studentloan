<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LoanTypeModel;
use App\AccountModel;

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
        // $loan_types = LoanTypeModel::get();

        $request->validate([
            'TuitionFee' => 'required',
            'Other' => 'required',
            'Duration' => 'required',
            'salary' => 'required',
            'cost_living' => 'required',
        ]);
        DB::table('accounts')
        ->where('accounts.SendDocuments_id','=',$id)
        ->update([
        'Duration' => $request->Duration,
        'TuitionFee' => $request->TuitionFee,
        'Other' => $request->Other,
        'cost_living' => $request->Duration * $request->salary,
        ]);

        // $Accounts = AccountModel::find($id);
        // $Accounts->Duration = $request->Duration;
        // $Accounts->TuitionFee = $request->TuitionFee;
        // $Accounts->Other = $request->Other;
        // $Accounts->cost_living = $request->Duration * $request->salary;
        // $Accounts->total = $request->TuitionFee + $request->Other + $Accounts->cost_living;

        // $Accounts->save();
        // dd($request);
        return redirect('/Accounts/dashboard');
    }

    public function show($id)
    {
        // $Profiles = DB::table('profiles')
        // ->join('send_documents','send_documents.profile_id','=','profiles.user_id')
        // ->join('accounts','accounts.SendDocuments_id','=','send_documents.SendDocuments_id')
        // ->join('loan_types','loan_types.id','=','send_documents.type_id')
        // ->select('*','profiles.id as ProfileID',
        //         'profiles.user_id as ProID',
        //         'accounts.SendDocuments_id as AccSD',
        //         // DB::raw('sum(accounts.Duration * loan_types.salary) as sumDuration'),
        //         DB::raw('sum(accounts.TuitionFee + accounts.Other + accounts.cost_living ) as total'), )
        // ->where('profiles.user_id' ,'=',$id)
        // ->orderBy('accounts.id', 'DESC')
        // ->groupBy('accounts.SendDocuments_id')

        // ->get();
        // return view('Accounts.show',compact('Profiles'));

        $Profiles = DB::table('profiles')
        ->join('send_documents','send_documents.profile_id','=','profiles.user_id')
        ->join('accounts','accounts.SendDocuments_id','=','send_documents.SendDocuments_id')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')

        ->where('profiles.user_id' ,'=',$id)
        // ->groupBy('accounts.SendDocuments_id')

        ->get();
        return view('Accounts.show',compact('Profiles'));
    }

    public function details($id){
        $details = DB::table('send_documents')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')
        ->select('*' )
        ->where('send_documents.SendDocuments_id' ,'=',$id)
        ->get();
        return view('Accounts.details',compact('details'));
    }


}
