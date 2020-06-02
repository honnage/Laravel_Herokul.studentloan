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
        return view('SendDocuments.dashboard');
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
    $sendDocument->SendDocuments_id = "Y".$sendDocument->school_year."T".$sendDocument->term."U".$sendDocument->profile_id ;
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
    $accounts->details =  $sendDocument->description;
    $accounts->profile_id = Auth::user()->id;
    $accounts->SendDocuments_id = $sendDocument->SendDocuments_id;
    $accounts->type_id = $sendDocument->type_id;
    $accounts->save();

    return redirect('/home');
    }
}
