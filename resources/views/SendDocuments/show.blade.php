@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card md-col-12">
            <div class="card-header">ข้อมูลการส่งเอกสาร&nbsp;&nbsp;&nbsp;
                <a href="/home"> My Profile </a>&nbsp;&nbsp;
            </div>
            @csrf
            <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    {{-- <th><center>#ID</center></th> --}}
                    <th><center>SendDocuments_id</center></th>
                    <th><center>ชื่อ - นามสุกล</center></th>
                    <th><center>ประเภท</center></th>
                    <th><center>ปีการศึกษา / ภาคเรียน </center></th>
                    <th><center>สถานะส่งเอกสาร</center></th>
                    <th><center>คำอธิบาย</center></th>
                    {{-- <th><center>เงิน</center></th> --}}
                    <th><center>ดำเนินการ</center></th>
                </thead>
                @foreach($SendDocument as $send)
                <tbody>
                <tr>
                    {{-- <td>{{ $send->SendID}}</td> --}}
                    <td>{{ $send->SendDocuments_id}}</td>
                    <td>{{ $send->fname }} &nbsp;&nbsp; {{ $send->lname }}</td>
                    <td><center>{{ $send->code }}</center></td>
                    <td>
                        {{-- <center>{{ $send->year }} / {{ $send->term }}</center> --}}
                        @if($send->term == 1)
                        <center>{{ $send->year }} / ภาคเรียนต้น</center>
                        @elseif($send->term == 2)
                        <center>{{ $send->year }} / ภาคเรียนปลาย</center>
                        @else
                        <center>{{ $send->year }} / ภาคเรียนฤดูร้อน</center>
                        @endif
                    </td>
                    <td>
                        {{-- <center>{{ $send->document_status }}</center> --}}
                        @if( $send->document_status == 1 )
                            <center>ตรวจเอกสารแล้ว</center>
                        @else
                            <center>ยังไม่ได้ตรวจ</center>
                        @endif
                    </td>
                    <td>
                        <center>
                        @if( $send->SendDescription == 0 )
                            <p style=""> ส่งบันทึก</p>
                        @elseif($send->SendDescription == 1)
                            <p style="color: #c80000"> ไม่ผ่าน</p>
                        @else
                            <p style="color: #00cc00"> ผ่าน</p>
                        @endif
                        </center>
                        {{-- <center>{{ $send->description }}</center> --}}
                    </td>
                    {{-- <td>{{ $send->description }}</td> --}}
                    {{-- <td>{{ $send->TuitionFee }}</td> --}}
                    <td>
                        <center>
                        <form action="/SendDocuments/destroy/{{$send->SendDocuments_id}}" method="get">

                            <a class="btn btn-outline-light col-sm-5" style="background: rgb(6, 182, 74); color: white"  href="/SendDocuments/details/{{$send->SendDocuments_id}}" >แสดง </a>

                            @if( $send->document_status == 1 )
                                {{-- <a class="btn btn-info col-sm-5" style="background: rgb(103, 218, 253); color: white" onclick="return confirm('ไม่สามารถลบ ได้เนื่องจากได้ตรวจเอกสารแล้ว')"> ลบ </a> --}}
                                <input type="submit" value="ลบ" data-name="{{$send->SendDocuments_id}}" class="btn btn-outline-light fail col-sm-5" style="background:rgb(103, 218, 253); color: white">

                            @else
                                {{-- <button type="submit" class="btn btn-danger col-sm-5"  onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่ไหม\n')" >DELETE</button> --}}
                                <input type="submit" value="ลบ" data-name="{{$send->SendDocuments_id}}" class="btn btn-danger deleteform col-sm-5">
                            @endif
                        </form>
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
</div>
@endsection
