<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoanTypeModel;
use Illuminate\Support\Facades\DB;

class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loantype = LoanTypeModel::all();
        return view('LoanType.index',compact('loantype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loantype = DB::table('loan_types')->get();
        return view('LoanType.create',compact('loantype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loantype = new LoanTypeModel;

        $request->validate([
            'code'=>'required',
            'type'=>'required',
            'salary'=>'required',
        ]);
        $loantype->code = $request->code;
        $loantype->type = $request->type;
        $loantype->salary = $request->salary;

        $loantype->save();
        return redirect('LoanType');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loantype = DB::table('loan_types')
        ->where('loan_types.id' ,'=',$id)->get();
        return view('LoanType.edit',compact('loantype'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'=>'required',
            'type'=>'required',
            'salary'=>'required',
        ]);

            DB::table('loan_types')
            ->where('id','=',$id)
            ->update([
            'code' => $request->code,
            'type' => $request->type,
            'salary' => $request->salary,
        ]);
        // dd($request->id);
        return redirect('LoanType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('loan_types')->where('id','=',$id)->delete();
        return redirect('LoanType');
    }
}
