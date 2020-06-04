
@extends('layouts.admin')
@section('content')
@foreach($Profiles as $profile)

@endforeach
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="card">
    @if(sizeof($Profiles) != 0)
        <div class="table-responsive">
            <div class="card-header">ข้อมูลการกู้ &nbsp;&nbsp;
                {{-- <a href="{{ route('AdminProfiles.index') }}"> แสดงข้อมูลผู้ใช้ทั้งหมด </a>&nbsp;&nbsp; --}}
            </div>

            <form action="" method="post" >
                {{-- <form action="{{ route('Profiles.update',$profile->user_id) }}" method="post" > --}}

                {{csrf_field()}}
                @method('PUT')
                {{-- {{Auth::user()->id }} --}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; เลขบัตรประชาชน :</label>
                        <input type="text" class="form-control col-sm-10" name="IdentificationCode" id="IdentificationCode" placeholder="เลขบัตรประชาชน" value=" {{ $profile->IdentificationCode }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ชื่อ - นามสุกล:</label>
                        <input type="text" class="form-control col-sm-6" name="fname" id="fname" placeholder="ชื่อจริง" value=" {{ $profile->fname }} {{ $profile->lname }}" readonly>

                        <label class="col-sm-2">&nbsp; เพศ :</label>
                        <input type="text" class="form-control col-sm-2" name="gender" id="gender" placeholder="เพศ" value=" {{ $profile->gender }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; E-mail :</label>
                        <input type="text" class="form-control col-sm-6" name="email" id="email" placeholder="email" value=" {{ $profile->email }}" readonly>

                        <label class="col-sm-2">&nbsp; เบอร์โทรศัพท์ :</label>
                        <input type="text" class="form-control col-sm-2" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" value=" {{ $profile->phone }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ที่อยู่ :</label>
                        <input type="text" class="form-control col-sm-10" name="address" id="address" placeholder="ที่อยู่" value=" {{ $profile->address }}" readonly>
                    </div>

                    {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label class="col-sm-2">&nbsp; ยอดเงินกู้รวม :</label>
                        <input type="text" class="form-control col-sm-10"  value=" {{ $profile->total }}" readonly>
                    </div> --}}
                </div>
                <div>
                    <table class="table  my-3" border="0">
                        <thead>
                            {{-- <th><center>#ID</center></th> --}}
                            <th><center>รหัสรายการ</center></th>
                            <th><center>ประเภท</center></th>
                            <th><center>ปีการศึกษา / ภาคเรียน</center></th>
                            <th><center>สัญญากู้</center></th>
                            <th><center>ค่าเทอม</center></th>
                            <th><center>ค่าอื่นๆ</center></th>
                            <th><center>ค่าครองชีพ</center></th>
                            <th><center>ยอดรวม</center></th>
                            <th><center>ดำเนินการ</center></th>
                        </thead>
                        <?php $total = 0 ?>
                        @foreach($Profiles as $profile)
                        <tbody>
                        <tr>
                            <?php $total = $total + $profile->TuitionFee + $profile->Other + $profile->cost_living?>
                            <td>{{ $profile->SendDocuments_id }}</td>
                            <td>{{ $profile->code }}</td>
                            <td><center>{{ $profile->year }} / {{ $profile->term }}</center></td>
                            <td>{{ $profile->Duration }} / เดือน</td>
                            <td>{{ number_format($profile->TuitionFee) }}</td>
                            <td>{{ number_format($profile->Other) }}</td>
                            {{-- <td>{{ number_format($profile->sumDuration) }} </td> --}}
                            <td>
                                {{-- @if($profile->cost_living == 0)
                                    <center><h4><b> - </b></h4></center>
                                @else --}}
                                    {{ number_format($profile->cost_living) }}
                                {{-- @endif --}}
                            </td>
                            <td>
                                {{-- @if($profile->total == 0)
                                    <center><h4><b> - </b></h4></center>
                                @else --}}
                                    {{ number_format($profile->cost_living + $profile->Other + $profile->TuitionFee) }}</td>
                                {{-- @endif --}}
                            <td>
                                <center>
                                <a class="btn btn-success" href="/Accounts/details/{{$profile->SendDocuments_id}}" >SHOW</a>
                                </center>
                            </td>
                            <?php $sum = $total ?>
                        </tr>
                        @endforeach
                        <tr style = "background:  #F0FFF0">
                            <td colspan="7">ยอดเงินรวม </td>
                            <td>{{ number_format($total) }} </td>
                            <td>บาท</td>
                            {{-- <td colspan="1"></td> --}}
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <center>
                            <a class="btn btn-primary" href="/Profiles/dashboard" >ย้อนกลับ</a>
                        </center>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </div>
    @else
    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">

       <center><br><h1> ข้อมูลผู้ใช้ระบบของ ID นี้ ยังไม่มีรายการ ลงทะเบียนกู้ </h1>
        <a class="btn btn-lg btn-primary my-3" href="/Profiles/dashboard" >ย้อนกลับ</a><br></center>

    </div>
    @endif
</div>
@endsection
