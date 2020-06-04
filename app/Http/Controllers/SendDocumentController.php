<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\LoanTypeModel;
use App\SendDocumentModel;
use App\AccountModel;

class SendDocumentController extends Controller
{
    public function dashboard(){
        $SendDocuments = DB::table('send_documents')
        ->join('profiles','profiles.user_id','=','send_documents.profile_id')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')
        ->select(
            '*',
            'send_documents.id as SendID',
            'send_documents.description as SendDescription',
            'send_documents.SendDocuments_id as SendDesID',
            'send_documents.created_at as SendDocumentsAt')

        // ->where('Activity.SendDocuments_id' ,'=','SendDocuments_id')
        // ->groupBy('SendDocuments.SendDocuments_id')
        ->orderBy('send_documents.id', 'DESC')
        ->get();
        return view('SendDocuments.dashboard',compact('SendDocuments'));

    }

    public function create(){
        $type = LoanTypeModel::orderBy('id')->get();
        $sendDocument = DB::table('send_documents')->get();
        return view('SendDocuments.create',compact('sendDocument','type'));
    }

    public function store(Request $request){
        //เพื่มข้อมูลตาราง SendDocuments
        $sendDocument = new SendDocumentModel();
        $request->validate([
            // 'SendDocuments_id'=>'required|unique:send_documents',
            'Student_ID'=>'required',
            'academy'=>'required',
            'faculty'=>'required',
            'major'=>'required',
            'year'=>'required',
            'school_year'=>'required',
            'term'=>'required',
            'recovery_status'=>'required',
            // 'description'=>'required',
            'type_id'=>'required',
        ]);
        $sendDocument->profile_id = Auth::user()->id;
        $sendDocument->Student_ID = $request->Student_ID;
        $sendDocument->academy = $request->academy;
        $sendDocument->faculty = $request->faculty;
        $sendDocument->major = $request->major;
        $sendDocument->year = $request->year;
        $sendDocument->school_year = $request->school_year;
        $sendDocument->term = $request->term;
        $sendDocument->recovery_status = $request->recovery_status;
        $sendDocument->document_status = 0; //ส่งเอกสาร
        $sendDocument->description = 0; //กำลังรอการตรวจสอบ
        $sendDocument->type_id = $request->type_id;
        $sendDocument->SendDocuments_id = "Y".$sendDocument->year."L".$sendDocument->school_year."T".$sendDocument->term."S". $sendDocument->recovery_status."U".$sendDocument->profile_id ;
        $sendDocument->save();

        //เพื่มข้อมูลตาราง Accounts
        $accounts = new AccountModel();
        $request->validate([
            // 'TuitionFee'=>'required',
            // 'Other'=>'required',
            // 'description'=>'required',
            // 'SendDocuments_id'=>'required',
            // 'type_id'=>'required',
        ]);
        $accounts->TuitionFee = "0";
        $accounts->Other = "0";
        $accounts->Duration = "0";
        $accounts->cost_living = "0";
        // $accounts->total = "0";
        $accounts->details =  $sendDocument->description;
        $accounts->profile_id = Auth::user()->id;
        $accounts->SendDocuments_id = $sendDocument->SendDocuments_id;
        $accounts->type_id = $sendDocument->type_id;
        $accounts->save();

        return redirect('/home');
    }

    public function edit($id)
    {
        $type = LoanTypeModel::orderBy('id')->get();
        $SendDocument = DB::table('send_documents')
        ->join('profiles','profiles.user_id','=','send_documents.profile_id')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')
        ->join('accounts','accounts.SendDocuments_id','=','send_documents.SendDocuments_id')
        ->select('*','send_documents.id as SendID','send_documents.created_at as SendDocumentsAt')

        ->orderBy('send_documents.id', 'DESC')
        ->where('send_documents.id' ,'=',$id)

        ->get();
        return view('SendDocuments.edit',compact('SendDocument','type'));
    }

    public function update(Request $request, $id){
        $request->validate([
            // 'school_year' => 'required',
            // 'term' => 'required',
            'description' => 'required',
        ]);

        DB::table('send_documents')
        ->where('send_documents.SendDocuments_id','=',$id)
        ->update([
        'description' => $request->description,
        'document_status' => 1,
        // 'SendDocuments_id' => $request->SendDocuments_id,
        ]);

        DB::table('accounts')
        ->where('accounts.SendDocuments_id','=',$id)
        ->update([
        'details' => $request->description,
        // 'Duration' => $request->Duration ,
        ]);

        // return redirect('/home');
        session()->flash("success","อัพเดทข้อมูลเรียบร้อย!");
        return redirect('/SendDocuments/dashboard');
    }

    public function show($id)
    {
        $SendDocument = DB::table('send_documents')

        ->join('profiles','profiles.user_id','=','send_documents.profile_id')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')

        ->select(
            '*',
            'send_documents.id as SendID',
            'send_documents.description as SendDescription',
            'send_documents.SendDocuments_id as SendDesID',
            'send_documents.created_at as SendDocumentsAt')
        ->where('send_documents.profile_id' ,'=',$id)
        ->orderBy('send_documents.id', 'DESC')
        ->get();
        return view('SendDocuments.show',compact('SendDocument'));
    }

    public function destroy($id)
    {
        DB::table('send_documents')
        ->where('send_documents.SendDocuments_id','=',$id)
        ->delete();

        DB::table('accounts')
        ->where('accounts.SendDocuments_id','=',$id)
        ->delete();
        return redirect('home');
    }

    public function details($id){
        $details = DB::table('send_documents')
        ->join('loan_types','loan_types.id','=','send_documents.type_id')
        ->select(
            '*',
            'send_documents.id as SendID',
            'send_documents.description as SendDescription',
            'send_documents.SendDocuments_id as SendDesID',
            'send_documents.created_at as SendDocumentsAt')
        ->where('send_documents.SendDocuments_id' ,'=',$id)
        ->get();
        return view('SendDocuments.details',compact('details'));

    }
}
