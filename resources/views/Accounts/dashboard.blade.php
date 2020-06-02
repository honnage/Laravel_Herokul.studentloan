@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">
                ข้อมูลบัญชี
            </div>
        @csrf

            <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>#ID</center></th>
                    {{-- <th><center>รหัสผู้กู้ </center></th> --}}
                    <th><center>รหัสเอกสาร </center></th>
                    <th><center>ชื่อ - นามสกุล </center></th>
                    <th><center>ประเภท </center></th>
                    <th><center>ค่าเล่าเรียน</center></th>
                    <th><center>ค่าเรียนเกี่ยวเนื่อง </center></th>
                    <th><center>ค่าครองชีพ </center></th>
                    <th><center>สัญญากู้</center></th>
                    <th><center>สถานะการอนุมัติ </center></th>
                    <th><center>ดำเนินการ</center></th>
                </thead>
                @foreach($Accounts as $account)
                <tbody>
                <tr>
                    <td>{{ $account->AccID}}</td>
                    {{-- <td>{{ $account->profile_id }}</td> --}}
                    <td>{{ $account->SendDocuments_id }}</td>
                    <td>{{ $account->fname }} &nbsp;&nbsp; {{ $account->lname }}</td>
                    <td><center>{{ $account->code }}</center></td>
                    <td>{{ number_format($account->TuitionFee) }}</td>
                    <td>{{ number_format($account->Other) }}</td>
                    <td>{{ number_format($account->cost_living) }}</td>
                    <td><center>{{ $account->Duration }} / เดือน</center></td>
                    <td>
                        <center>
                            @if( $account->description == "ผ่าน" )
                                <p style="color: #00cc00"> ผ่าน</p>
                            @elseif($account->description == "ไม่ผ่าน")
                                <p style="color: #ff1a1a"> {{$account->description}} </p>
                            @else
                                <p > {{$account->description}} </p>
                            @endif
                            </center>
                        {{-- {{ $account->descridetailsption }} --}}
                    </td>
                    <td>
                        <center>
                            @if( $account->description == 2 || $account->cost_living == 0 )
                                <a class="btn btn-outline-light" style="background: #05CA26" href="" > PASS</a>
                            @elseif($account->description == 1 && $account->cost_living != 0 )
                                <a class="btn btn-outline-light"  style="background: #F2B660 ; " href=""> EDIT</a>
                            @elseif($account->description == 0)
                                <a class="btn btn-outline-light" style="background: #D70323; color: white" onclick="return confirm('ต้องได้การอนุมัติว่า ผ่าน ก่อน ')"> NOPE </a>
                            @else
                                <a class="btn btn-outline-light" style="background: #007FE3; color: white" onclick="return confirm('กำลังตรวจสอบข้อมูล')"> WAIT </a>
                            @endif
                        </center>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            </body>
        </div>
    </div>
</div>
</div>
@endsection
