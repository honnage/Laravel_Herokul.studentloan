@extends('layouts.admin')

@section('content')
@foreach($user as $user)
@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">แก้ไขสถานะ &nbsp;&nbsp;</div>

            <form action="/User/update/{{$user->id}}" method="post" >
                {{csrf_field()}}
                {{-- @method('PUT') --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; E-mail <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="email" id="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ID <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="id" id="id" value="{{ $user->id }}" readonly>

                        <label class="col-sm-2">&nbsp; สถานะ <label style="color:red;"> * </label></label>
                        {{-- <input type="text" class="form-control col-sm-4" name="StatusID" id="StatusID"  value="{{ $user->StatusID }}"> --}}
                        @if(Auth::user()->StatusID == 2 || Auth::user()->id == 1)
                        <select class="form-control col-sm-4" name="StatusID">
                            @if( $user->id == "1")
                                <option value="{{$user->StatusID}}">ID 1 สถานะเป็น Admin เสมอ</option>
                                <option value="1">แก้ไขเป็น: Moderator</option>
                                <option value="0">แก้ไขเป็น: User</option>
                                <option value="2">แก้ไขเป็น: Admin</option>
                            @elseif( $user->StatusID == "0")
                                <option value="{{$user->StatusID}}">ปัจจุบัน: User</option>
                                <option value="1">แก้ไขเป็น: Moderator</option>
                                <option value="2">แก้ไขเป็น: Admin</option>
                            @elseif( $user->StatusID == "1")
                                <option value="{{$user->StatusID}}">ปัจจุบัน: Moderator</option>
                                <option value="2">แก้ไขเป็น: Admin</option>
                                <option value="0">แก้ไขเป็น: User</option>
                            @else
                                <option value="{{$user->StatusID}}">ปัจจุบัน:Admin</option>
                                <option value="1">แก้ไขเป็น: Moderator</option>
                                <option value="0">แก้ไขเป็น: User</option>
                            @endif
                        </select>
                        @else
                            <input type="text" class="form-control col-sm-6" name="id" id="id"
                            @if($user->id == "1")
                                value="Admin"
                            @elseif( $user->StatusID == 2)
                                value="Admin"
                            @elseif( $user->StatusID == 1)
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
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

                    <center><br><h1> ข้อมูลผู้ใช้ ID นี้ ยังไม่ทำรายการเพื่มข้อมูลส่วนตัว</h1></center>
                    <a class="btn btn-lg btn-primary my-3" href="/Profiles/dashboardUser" >ย้อนกลับ</a><br>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
