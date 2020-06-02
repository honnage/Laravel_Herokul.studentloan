<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendDocumentController extends Controller
{
    public function dashboard(){
        return view('SendDocuments.dashboard');
    }
}
