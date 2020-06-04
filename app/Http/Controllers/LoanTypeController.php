<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoanTypeModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     $loantype = LoanTypeModel::all();
    //     return view('LoanType.index',compact('loantype'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = LoanTypeModel::all();

        $loantype = DB::table('loan_types')->get();
        return view('LoanType.create',compact('loantype','data'));
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
            'type'=>'required',
            'code'=>'required',
            'salary'=>'required',
        ]);
        $loantype->type = $request->type;
        $loantype->code = $request->code;
        $loantype->salary = $request->salary;

        $loantype->save();
        // dd($request);
        session()->flash("success","เพิ่มข้อมูลเรียนร้อย!");

        return redirect('/LoanType/create');
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
        session()->flash("success","อัพเดทข้อมูลเรียบร้อย!");
        return redirect('/LoanType/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('loan_types')
        ->where('id','=',$id)
        ->delete();
        session()->flash("warning","ลบข้อมูลเรียบร้อยแล้ว!");
        return redirect('/LoanType/create');
    }
}
