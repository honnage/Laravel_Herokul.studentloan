@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    ข้อมูลบัญชี
                </div>
                @csrf

                <body {{--class="text-center"--}} style="">

                <table class="table" border="0">
                    <thead class="thead-dark">
                        {{-- <th><center>#ID</center></th> --}}
                        <th><center>CODE </center></th>
                        <th><center>ชื่อ - นามสกุล </center></th>
                        <th><center>ประเภท </center></th>
                        <th><center>ค่าเทอม</center></th>
                        <th><center>ค่าเกี่ยวเนื่อง </center></th>
                        <th><center>ค่าครองชีพ </center></th>
                        <th><center>สัญญากู้</center></th>
                        <th><center>สถานะ </center></th>
                        <th><center>ดำเนินการ</center></th>
                    </thead>
                    @foreach($Accounts as $account)
                    <tbody>
                    <tr>
                        {{-- <td>{{ $account->AccID}}</td> --}}
                        <td>{{ $account->SendDocuments_id }}</td>
                        <td>{{ $account->fname }} &nbsp;&nbsp; {{ $account->lname }}</td>
                        <td><center>{{ $account->code }}</center></td>
                        <td>
                            @if($account->TuitionFee == 0)
                            <center><h4><b> - </b></h4></center>
                            @else
                            {{ number_format($account->TuitionFee) }}
                            @endif
                        </td>
                        <td>
                            @if($account->TuitionFee == 0)
                            <center><h4><b> - </b></h4></center>
                            @else
                                {{ number_format($account->Other) }}
                            @endif
                        </td>
                        <td>
                            @if($account->TuitionFee == 0)
                            <center><h4><b> - </b></h4></center>
                            @else
                                {{ number_format($account->cost_living) }}
                            @endif
                        </td>
                        <td>
                            @if($account->TuitionFee == 0)
                            <center><h4><b> - </b></h4></center>
                            @else
                                <center>{{ $account->Duration }} / เดือน</center>
                            @endif
                        </td>
                        <td>
                            <center>
                                @if( $account->description == 2 )
                                    <p style="color: #00cc00"> ผ่าน</p>
                                @elseif($account->description == 1)
                                    <p style="color: #ff1a1a"> ไม่ผ่าน </p>
                                @else
                                    <p>ยังไม่ได้ตรวจ</p>
                                @endif

                                </center>
                            {{-- {{ $account->descridetailsption }} --}}
                        </td>
                        <td>
                            <center>
                                @if( $account->details == 2  )
                                    <a class="btn btn-outline-light" style="background: #05CA26" href="/Accounts/edit/{{$account->SendDocuments_id}}" > PASS</a>
                                {{-- @elseif($account->details == 1 )
                                    <a class="btn btn-outline-light"  style="background: #F2B660 ; " href=""> EDIT</a> --}}
                                @elseif($account->details == 1)
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
