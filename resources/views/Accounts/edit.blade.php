@extends('layouts.admin')

@section('content')
@foreach($Accounts as $account)

@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">รายการบัญชี :{{ $account->SendDocuments_id}}  &nbsp;&nbsp;
                <a href="/Accounts/dashboard"> ธุรกรรมทั้งหมด </a>&nbsp;&nbsp;
            </div>

            <form action="/Accounts/update/{{$account->SendDocuments_id}}" method="post" >
                {{csrf_field()}}
                {{-- @method('PUT') --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; เลขบัตรประชาชน :</label>
                        <input type="text" class="form-control col-sm-10" name="IdentificationCode" id="IdentificationCode" placeholder="เลขบัตรประชาชน" value=" {{ $account->IdentificationCode }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ชื่อ - นามสกุล :</label>
                        <input type="text" class="form-control col-sm-10" name="fname" id="fname" placeholder="ชื่อจริง" value=" {{ $account->fname }} {{ $account->lname }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; รหัสนักศึกษา :</label>
                        <input type="text" class="form-control col-sm-6" name="Student_ID" id="Student_ID" placeholder="รหัสนักศึกษา" value=" {{ $account->Student_ID }}" readonly>

                        <label class="col-sm-2">&nbsp; เพศ :</label>
                        <input type="text" class="form-control col-sm-2" name="gender" id="gender" placeholder="เพศ" value="{{ $account->gender }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; คณะ :</label>
                        <input type="text" class="form-control col-sm-2" name="faculty" id="faculty"  value=" {{ $account->faculty }}" readonly>

                        <label class="col-sm-2">&nbsp; สาขา :</label>
                        <input type="text" class="form-control col-sm-2" name="major" id="major" value=" {{ $account->major }}" readonly>

                        <label class="col-sm-2">&nbsp; ชั้นปี :</label>
                        <input type="text" class="form-control col-sm-2" name="year" id="year"  value=" {{ $account->school_year }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ปีการศึกษา :</label>
                        <input type="text" class="form-control col-sm-6" name="school_year" id="school_year" placeholder="ปีการศึกษา"  value="{{ $account->year }}" readonly>

                        <label class="col-sm-2">&nbsp; ภาคเรียน :</label>
                        <input type="text" class="form-control col-sm-2" name="term" id="term" placeholder="ภาคเรียน"
                        @if($account->term == 1)
                            value="ต้น"
                        @elseif($account->term == 2)
                            value="ปลาย"
                        @else
                            value="ฤดูร้อน"
                        @endif readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">CODE :</label>
                        <input type="text" class="form-control col-sm-4" name="SendDocuments_id" id="SendDocuments_id" value="{{ $account->SendDocuments_id }}" readonly>

                        <label class="col-sm-2">วันที่ส่งเอกสาร :</label>
                        <input type="text" class="form-control col-sm-4" value="{{ $account->AccountsAt }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ประเภทการกู้ :</label>
                        <input type="text" class="form-control col-sm-4" name="type_id" id="type_id" placeholder="ประเภทการกู้" value="{{ $account->type }}" readonly>

                        <label class="col-sm-2">สถานะการขอกู้ :</label>
                        <input type="text" class="form-control col-sm-4" name="recovery_status" id="recovery_status"
                            @if($account->recovery_status == 0)
                                value="ผู้ขอกู้รายใหม่"
                            @else
                                value="ผู้ขอกู้รายเก่า"
                            @endif readonly>
                    </div>


                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">ระยะเวลาสัญญากู้ :</label>
                        <input type="text" class="form-control col-sm-4" name="Duration" id="Duration" placeholder="ระยะเวลาสัญญากู้" value="{{ $account->Duration }} เดือน" readonly>

                        <label class="col-sm-2">สถานะการตรวจเอกสาร :</label>
                        <input type="text" class="form-control col-sm-4" name="description" id="description" placeholder="คำอธิบาย"
                        @if($account->description == 0)
                            value="ยังไม่ได้ตรวจเอกสาร"
                        @else
                            value="ตรวจเอกสารแล้ว"
                        @endif readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-3">ระยะเวลาสัญญากู้ (เดือน) :</label>
                        <input type="text" class="form-control col-sm-3" name="Duration" id="Duration" placeholder="เช่น 4" value="{{ $account->Duration }}" >

                        <label class="col-sm-3">ค่าครองชีพ :</label>
                        <input type="text" class="form-control col-sm-1" name="salary" id="salary" placeholder="เช่น 20000" value="{{ $account->salary }}"  readonly>
                        <label class="col-sm-1">/ เดือน</label>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-3">ค่าเทอม :</label>
                        <input type="text" class="form-control col-sm-3" name="TuitionFee" id="TuitionFee" placeholder="เช่น 20000" value="{{ $account->TuitionFee}}" >

                        <label class="col-sm-3">ค่าครองชีพรวม :</label>
                        <input type="text" class="form-control col-sm-2" name="cost_living" id="cost_living" placeholder="เช่น 20000" value="{{ number_format($account->cost_living) }} = {{ number_format($account->salary)}} x {{ $account->Duration }}"  readonly>
                        {{-- <input type="text" class="form-control col-sm-2" name="cost_living" id="cost_living" placeholder="เช่น 20000" value="{{ number_format($account->cost_living) }}"  readonly> --}}
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-3">ค่าใช้จ่ายที่เกี่ยวเนื่องกับการศึกษา :</label>
                        <input type="text" class="form-control col-sm-9" name="Other" id="Other" placeholder="เช่น 20000" value="{{ $account->Other }}" >
                    </div>
                    {{-- <input type="hidden" class="form-control" name="cost_living" id="cost_living" value= "{{ $account->Duration * $account->salary }}"/> --}}
                </div>

                <center>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-4">
                        <button type="submit" name="submit" class="btn btn-success">อัพเดท</button>
                        <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                    </div>
                </center>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
