@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">เพื่มข้อมูล &nbsp;&nbsp;
                <a href="{{ route('LoanType.index') }}"> แสดงข้อมูลประเภทงานทั้งหมด </a>&nbsp;&nbsp;
            </div>

            <form action=" {{ route('LoanType.store') }} " method="post" >
                {{csrf_field()}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; ประเภทการกู้เงิน :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="type" id="type" placeholder="เช่น กองทุนเงินให้กู้ยืมเพื่อการศึกษา ">
                     </div>

                     <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; ชื่อย่อ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="code" id="code" placeholder="เช่น กยศ ">
                     </div>

                     <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ค่าครองชีพ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="salary" id="salary" placeholder="เช่น 2400 ">
                     </div>

                </div>
                <center>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-4">
                        <button type="submit" name="submit" class="btn btn-success">เพื่มข้อมูล</button>
                        <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                    </div>
                </center>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
