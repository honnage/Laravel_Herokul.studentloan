@extends('layouts.app')
@section('content')
@foreach($profiles as $profile)

@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">

        <div class="table-responsive">
            <div class="card-header">เพื่มข้อมูล  &nbsp;&nbsp;
                {{-- <a href="{{ route('Profiles.index') }}"> My Profile </a>&nbsp;&nbsp; --}}
                <a href="/home"> My Profile </a>&nbsp;&nbsp;
            </div>

            <form action="{{ route('Profiles.update',$profile->user_id) }}" method="post" >
                {{csrf_field()}}
                @method('PUT')
                {{-- {{Auth::user()->id }} --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <label class="col-sm-2">&nbsp; เลขบัตรประชาชน :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="IdentificationCode" id="IdentificationCode" placeholder="เลขบัตรประชาชน" value=" {{ $profile->IdentificationCode }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ชื่อ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="fname" id="fname" placeholder="ชื่อจริง" value=" {{ $profile->fname }}">

                        <label class="col-sm-2">&nbsp; นามสุกล :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="lname" id="lname" placeholder="นามสกุล" value=" {{ $profile->lname }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; วันเกิด :<label style="color:red;"> * </label></label>
                        <input type="date" class="form-control col-sm-4" name="birthdate" id="birthdate"  value="{{$profile->birthdate}}" >

                        <label class="col-sm-2">&nbsp; เพศ :<label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control " name="gender">
                                <option value="{{ $profile->gender }}">สถานะปัจุบัน {{ $profile->gender }}</option>
                                <option value="เพศชาย">เพศชาย</option>
                                <option value="เพศหญิง">เพศหญิง</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; เบอร์โทรศัพท์ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" value=" {{ $profile->phone }}">

                        <label class="col-sm-2">&nbsp; E-mail :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="email" id="email" placeholder="email" value=" {{ $profile->email }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ที่อยู่ :<label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="ที่อยู่" value=" {{ $profile->address }}">
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
