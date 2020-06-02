@extends('layouts.admin')

@section('content')
@foreach($loantype as $type)
@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">แก้ไขประเภทการกู้เงิน &nbsp;&nbsp;
                <a href="{{ route('LoanType.index') }}"> หัวข้อประเภทงานทั้งหมด </a>&nbsp;&nbsp;
            </div>

            <form action="{{ route('LoanType.update',$type->id) }}" method="post" >
                {{csrf_field()}}
                @method('PUT')
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; ประเภทการกู้เงิน <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="type" id="type" placeholder="เช่น กองทุนเงินให้กู้ยืมเพื่อการศึกษา  " value="{{ $type->type }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; ชื่อย่อ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="code" id="code" placeholder="เช่น กยศ  " value="{{ $type->code }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ค่าครองชีพ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="salary" id="salary" placeholder="เช่น 2400" value="{{ $type->salary }}">
                    </div>
                </div>

                <center>
                    <button type="submit" name="submit" class="btn btn-success">อัพเดท</button>
                    <button class="btn btn-secondary " type="reset">ยกเลิก</button>
                </center>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
