@extends('layouts.admin')

@section('content')
@foreach($users as $users)
@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">แก้ไขสถานะ &nbsp;&nbsp;
                <a href=""> หัวข้อประเภทงานทั้งหมด </a>&nbsp;&nbsp;
            </div>

            <form action="/User/update/{{$users->id}}" method="post" >
                {{csrf_field()}}
                {{-- @method('PUT') --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; E-mail <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="email" id="email" value="{{ $users->email }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ID <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="id" id="id" value="{{ $users->id }}" readonly>

                        <label class="col-sm-2">&nbsp; สถานะ <label style="color:red;"> * </label></label>
                        {{-- <input type="text" class="form-control col-sm-4" name="StatusID" id="StatusID"  value="{{ $users->StatusID }}"> --}}
                        @if(Auth::user()->StatusID == 2 || Auth::user()->id == 1)
                            <select class="form-control col-sm-4" name="StatusID">
                                @if( $users->id == "1")
                                    <option value="{{$users->StatusID}}">ID 1 สถานะเป็น Admin เสมอ</option>
                                    <option value="1">แก้ไขเป็น: Moderator</option>
                                    <option value="0">แก้ไขเป็น: User</option>
                                    <option value="2">แก้ไขเป็น: Admin</option>
                                @elseif( $users->StatusID == "0")
                                    <option value="{{$users->StatusID}}">ปัจจุบัน: User</option>
                                    <option value="1">แก้ไขเป็น: Moderator</option>
                                    <option value="2">แก้ไขเป็น: Admin</option>
                                @elseif( $users->StatusID == "1")
                                    <option value="{{$users->StatusID}}">ปัจจุบัน: Moderator</option>
                                    <option value="2">แก้ไขเป็น: Admin</option>
                                    <option value="0">แก้ไขเป็น: User</option>
                                @else
                                    <option value="{{$users->StatusID}}">ปัจจุบัน:Admin</option>
                                    <option value="1">แก้ไขเป็น: Moderator</option>
                                    <option value="0">แก้ไขเป็น: User</option>
                                @endif
                            </select>
                        @else
                            <input type="text" class="form-control col-sm-6" name="id" id="id"
                            @if($users->id == "1")
                                value="Admin"
                            @elseif( $users->StatusID == 2)
                                value="Admin"
                            @elseif( $users->StatusID == 1)
                                value="Moderator"
                            @else
                                value="User"
                            @endif readonly>
                        @endif
                        @if(Auth::user()->StatusID == 2 || Auth::user()->id == 1)
                            <button type="submit" name="submit" class="btn btn-success col-sm-1">อัพเดท</button>
                            <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="col-md-12 my-3">
        <div class="card my-4">
            <div class="card-header" style="background-color:#494B4B; color: white"><strong> ข้อมูลของผู้ใช้ </strong></div>
            <div class="form-inline">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav class="col-sm-2">เลขบัตรประชาชน</nav>
                    <input type="text" class="form-control col-sm-10" name="IdentificationCode" id="IdentificationCode" value="{{$users->IdentificationCode}}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav class="col-sm-2">ชื่อ</nav>
                    <input type="text" class="form-control col-sm-4" name="fname" id="fname"  value="{{$users->fname}}" readonly>

                    <nav class="col-sm-2">นามสกุล</nav>
                    <input type="text" class="form-control col-sm-4" name="lname" id="lname"  value="{{$users->lname}}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav class="col-sm-2">วันเดือนปีเกิด</nav>
                    <input type="date" class="form-control col-sm-4" name="birthdate" id="birthdate"  value="{{$users->birthdate}}" readonly>

                    <nav class="col-sm-2">เพศ</nav>
                    <input type="text" class="form-control col-sm-4" name="gender" id="gender"  value="{{$users->gender}}" readonly>

                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav class="col-sm-2">เบอร์โทรศัพท์</nav>
                    <input type="text" class="form-control col-sm-4" name="phone" id="phone" value="{{$users->phone}}" readonly>

                    <nav class="col-sm-2">E-mail</nav>
                    <input type="text" class="form-control col-sm-4" name="email" id="email" value="{{$users->email}}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav class="col-sm-2">ที่อยู่</nav>
                    <input type="text" class="form-control col-sm-10" name="address" id="address" value="{{$users->address}}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <a href="/Profiles/dashboardUser"  class="btn btn-primary col-sm-2">ย้อนกลับ</a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
