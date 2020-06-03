@extends('layouts.admin')
@section('content')
@foreach($details as $detail)

@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">
    @if(sizeof($details) != 0)
        <div class="table-responsive">
            <div class="card-header">ข้อมูลการกู้ &nbsp;&nbsp;
                {{-- <a href="{{ route('Profiles.index') }}"> My Profile </a>&nbsp;&nbsp; --}}
                {{-- <a href="{{ route('AdminProfiles.show',$detail->profile_id) }}"> ย้อนกลับ </a>&nbsp;&nbsp; --}}
            </div>

                {{-- {{Auth::user()->id }} --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; รหัสรายการ :</label>
                        <input type="text" class="form-control col-sm-10" value=" {{ $detail->SendDocuments_id }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ประเภท :</label>
                        <input type="text" class="form-control col-sm-4" value=" {{ $detail->type }}" readonly>

                        <label class="col-sm-2">&nbsp; สถานะ :</label>
                        <input type="text" class="form-control col-sm-4"
                            @if($detail->recovery_status == 0)
                                value="ผู้ขอกู้รายใหม่"
                            @else
                                value="ผู้ขอกู้รายเก่า"
                            @endif
                        readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ปีการศึกษา :</label>
                        <input type="text" class="form-control col-sm-4" value=" {{ $detail->year }}" readonly>

                        <label class="col-sm-2">&nbsp; ภาคเรียน :</label>
                        <input type="text" class="form-control col-sm-4"
                            @if($detail->term == 1)
                                value="ต้น"
                            @elseif($detail->term == 2)
                                value="ปลาย"
                            @else
                                value="ฤดูร้อน"
                            @endif
                        readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; คณะ :</label>
                        <input type="text" class="form-control col-sm-3" value=" {{ $detail->academy }}" readonly>

                        <label class="col-sm-2">&nbsp; สาขา :</label>
                        <input type="text" class="form-control col-sm-3" value=" {{ $detail->major }}" readonly>

                        <label class="col-sm-1">&nbsp; ชั้นปี :</label>
                        <input type="text" class="form-control col-sm-1" value=" {{ $detail->school_year }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; รหัสนิสิต :</label>
                        <input type="text" class="form-control col-sm-2" value=" {{ $detail->Student_ID }}" readonly>

                        <label class="col-sm-2">&nbsp; มหาวิทยาลัย :</label>
                        <input type="text" class="form-control col-sm-6" value=" {{ $detail->academy }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-4">
                        <center><a class="btn btn-primary" href="/Accounts/show/{{$detail->profile_id}}"> ย้อนกลับ </a></center>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

       <center><br><h1> ข้อมูลผู้ใช้ระบบของ ID นี้ ยังไม่มีรายการ ลงทะเบียนกู้ </h1>
        <a class="btn btn-primary" href="/Accounts/show/{{$detail->profile_id}}"> ย้อนกลับ </a>

    </div>
    @endif
</div>
@endsection
