@extends('layouts.app')

@section('content')

<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card-header">ส่งเอกสาร  &nbsp;&nbsp;
                {{-- <a href="{{ route('Profiles.index') }}"> My Profile </a>&nbsp;&nbsp; --}}
                <a href="/home"> My Profile </a>&nbsp;&nbsp;
            </div>

            <form action="/SendDocuments/store" method="post" >
                {{csrf_field()}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">สถานะการขอกู้ :<label style="color:red;"> * </label></label>
                        <div class = "col-sm-10">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class = "col-sm-3">
                                    <div class="form-inline">
                                    <input type="radio" id="recovery_status" name="recovery_status" value="0"> &nbsp;&nbsp;
                                    <label for="รายใหม่">รายใหม่ </label><br>
                                    </div>
                                </div>
                                <div class = "col-sm-3">
                                    <div class="form-inline">
                                    <input type="radio" id="recovery_status" name="recovery_status" value="1"> &nbsp;&nbsp;
                                    <label for="รายเก่า">รายเก่า </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ภาคเรียน :<label style="color:red;"> * </label></label>
                        <div class = "col-sm-10">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class = "col-sm-3">
                                    <div class="form-inline">
                                    <input type="radio" id="term" name="term" value="1"> &nbsp;&nbsp;
                                    <label for="ภาคเรียนที่ 1">ภาคเรียนที่ 1</label><br>
                                    </div>
                                </div>
                                <div class = "col-sm-3">
                                    <div class="form-inline">
                                    <input type="radio" id="term" name="term" value="2"> &nbsp;&nbsp;
                                    <label for="ภาคเรียนที่ 2">ภาคเรียนที่ 2</label><br>
                                    </div>
                                </div>
                                <div class = "col-sm-3">
                                    <div class="form-inline">
                                    <input type="radio" id="term" name="term" value="3"> &nbsp;&nbsp;
                                    <label for="ภาคเรียนฤดูร้อน">ภาคเรียนฤดูร้อน</label><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; รหัสนักศึกษา :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="Student_ID" id="Student_ID" placeholder="รหัสนักศึกษา">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; มหาวิทยาลัย :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="academy" id="academy" placeholder="มหาวิทยาลัย">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; คณะ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="faculty" id="faculty" placeholder="คณะ">

                        <label class="col-sm-2">&nbsp; สาขา :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="major" id="major" placeholder="สาขา">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ประเภทการกู้ :<label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control" name="type_id">
                                <option value="" ><label style="color:brown" >กรุณาเลือกประเภทที่จะกู้</label></option>
                                @foreach($type as $type)
                                <option value = "{{$type->id}}">
                                    {{$type->type}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <label class="col-sm-2">&nbsp; ปีการศึกษา :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="year" id="year" placeholder="ปีการศึกษา">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ชั้นปี :<label style="color:red;"> * </label></label>
                        {{-- <input type="text" class="form-control col-sm-10" name="school_year" id="school_year" placeholder="เช่น 1"> --}}
                        <div class = "col-sm-10">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="1"> &nbsp;&nbsp;
                                        <label for="1">ปี 1</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="2"> &nbsp;&nbsp;
                                        <label for="2">ปี 2</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="3"> &nbsp;&nbsp;
                                        <label for="3">ปี 3</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="4"> &nbsp;&nbsp;
                                        <label for="4">ปี 4</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="5"> &nbsp;&nbsp;
                                        <label for="5">ปี 5</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class = "">
                                    <div class="form-inline">
                                        <input type="radio" id="school_year" name="school_year" value="6"> &nbsp;&nbsp;
                                        <label for="6">ปี 6</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
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
