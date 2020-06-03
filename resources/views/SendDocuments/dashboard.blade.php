@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ข้อมูลการส่งเอกสาร&nbsp;&nbsp;&nbsp;</div>
                @csrf
                <body {{--class="text-center"--}} style="">
                <table class="table" border="0">
                    <thead class="thead-dark">
                        {{-- <th><center>#ID</center></th> --}}
                        <th><center>CODE</center></th>
                        <th><center>ชื่อ - นามสุกล</center></th>
                        <th><center>ประเภท</center></th>
                        <th><center>ปีการศึกษา / ภาคเรียน </center></th>
                        <th><center>คำอธิบาย</center></th>
                        <th><center>ดำเนินการ</center></th>
                    </thead>
                    @foreach($SendDocuments as $send)
                    <tbody>
                    <tr>
                        {{-- <td>{{ $send->SendID}}</td> --}}
                        <td>{{ $send->SendDocuments_id}}</td>
                        <td>{{ $send->fname }} &nbsp;&nbsp; {{ $send->lname }}</td>
                        <td><center>{{ $send->code }}</center></td>
                        <td><center>{{ $send->year }} / {{ $send->term }}</center></td>
                        <td>
                            <center>
                            @if( $send->document_status == 1 )
                                <p style="color: #00cc00"> ตรวจเอกสารแล้ว</p>
                            @else
                                <p> ยังไม่ได้ตรวจ </p>
                            @endif
                            </center>
                        </td>
                        <td>
                            <center>
                            <a class="btn btn-warning" href="/SendDocuments/edit/{{$send->SendID}}" >EDIT</a>
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
