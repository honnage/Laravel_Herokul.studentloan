<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LoanTypeModel;


class SendDocumentController extends Controller
{
    public function dashboard(){
        return view('SendDocuments.dashboard');
    }

    public function create(){
        $type = LoanTypeModel::orderBy('id')->get();
        $profiles = DB::table('send_documents')->get();
        return view('SendDocuments.create',compact('profiles','type'));
    }

    public function store(){

    }
}
