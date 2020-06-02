@extends('layouts.admin')

@section('content')
@foreach($SendDocument as $adminSend)

@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">ตรวจเอกสาร ID :{{ $adminSend->SendID}} &nbsp;&nbsp;
                <a href="/SendDocuments/dashboard"> เอกสารทั้งหมด </a>&nbsp;&nbsp;
            </div>

            <form action="/SendDocuments/update/{{$adminSend->SendDocuments_id}}" method="post" >
                {{csrf_field()}}
                {{-- @method('PUT') --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">CODE :</label>
                        <input type="text" class="form-control col-sm-4" name="SendDocuments_id" id="SendDocuments_id" value="{{ $adminSend->SendDocuments_id }}" readonly>

                        <label class="col-sm-2">วันที่ส่งเอกสาร :</label>
                        <input type="text" class="form-control col-sm-4" value="{{ $adminSend->SendDocumentsAt }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; เลขบัตรประชาชน :</label>
                        <input type="text" class="form-control col-sm-10" name="IdentificationCode" id="IdentificationCode" placeholder="เลขบัตรประชาชน" value=" {{ $adminSend->IdentificationCode }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ชื่อ - นามสกุล :</label>
                        <input type="text" class="form-control col-sm-10" name="fname" id="fname" placeholder="ชื่อจริง" value=" {{ $adminSend->fname }} {{ $adminSend->lname }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; รหัสนักศึกษา :</label>
                        <input type="text" class="form-control col-sm-4" name="Student_ID" id="Student_ID" placeholder="รหัสนักศึกษา" value=" {{ $adminSend->Student_ID }}" readonly>

                        <label class="col-sm-2">&nbsp; เพศ :</label>
                        <input type="text" class="form-control col-sm-4" name="gender" id="gender" placeholder="เพศ" value="{{ $adminSend->gender }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; มหาวิทยาลัย :</label>
                        <input type="text" class="form-control col-sm-4" name="academy" id="academy"  value=" {{ $adminSend->academy }}" readonly>

                        <label class="col-sm-2">&nbsp; คณะ :</label>
                        <input type="text" class="form-control col-sm-4" name="faculty" id="faculty" value=" {{ $adminSend->faculty }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; สาขา :</label>
                        <input type="text" class="form-control col-sm-4" name="major" id="major" value=" {{ $adminSend->major }}" readonly>

                        <label class="col-sm-2">&nbsp; ชั้นปี :</label>
                        <input type="text" class="form-control col-sm-4" name="year" id="year"  value=" {{ $adminSend->year }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ปีการศึกษา :</label>
                        <input type="text" class="form-control col-sm-6" name="school_year" id="school_year" placeholder="ปีการศึกษา"  value="{{ $adminSend->school_year }}" readonly>

                        <label class="col-sm-2">&nbsp; ภาคเรียน :</label>
                        <input type="text" class="form-control col-sm-2" name="term" id="term" placeholder="ภาคเรียน" value="{{ $adminSend->term }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ประเภทการกู้ :</label>
                        <input type="text" class="form-control col-sm-6" name="type_id" id="type_id" placeholder="ประเภทการกู้" value="{{ $adminSend->type }}" readonly>

                        <label class="col-sm-2">&nbsp; ชื่อย่อ :</label>
                        <input type="text" class="form-control col-sm-2" name="code" id="code" placeholder="ชื่อย่อ" value="{{ $adminSend->code }}" readonly>
                    </div>


                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">สถานะการขอกู้ :</label>
                        <input type="text" class="form-control col-sm-10"
                        {{-- value="{{ $adminSend->recovery_status }}"  --}}
                        @if( $adminSend->recovery_status == 0)
                            value="ยังไม่ได้ตรวจเอกสาร"
                        @endif
                            value="ตรวจเอกสารแล้ว"
                        readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">คำอธิบาย :<nav style="color: red">*</nav></label>
                        {{-- <input type="text" class="form-control col-sm-10" name="description" id="description" placeholder="คำอธิบาย" value="{{ $adminSend->description }}" > --}}
                        <div class = "col-sm-5">
                            <select class="form-control" name="description">
                                @if($adminSend->description == 0)
                                    <option value="0">สถานะปัจจุบัน: ยังไม่ได้ตรวจ</option>
                                    <option value="2">แก้ไขเป็น: ผ่าน</option>
                                    <option value="1">แก้ไขเป็น: ไม่ผ่าน</option>
                                @elseif($adminSend->description == 1)
                                    <option value="1">สถานะปัจจุบัน: ไม่ผ่าน</option>
                                    <option value="2">แก้ไขเป็น: ผ่าน</option>
                                @elseif($adminSend->description == 2)
                                    <option value="2">สถานะปัจจุบัน: ผ่าน</option>
                                    <option value="1">แก้ไขเป็น: ไม่ผ่าน</option>
                                @endif
                            </select>
                        </div>
                    </div>

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
