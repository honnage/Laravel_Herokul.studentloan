@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">ข้อมูลการส่งเอกสาร&nbsp;&nbsp;&nbsp;</div>
        @csrf
            <body {{--class="text-center"--}} style="">
            <table class="table" border="0">
                <thead>
                    {{-- <th><center>#ID</center></th> --}}
                    <th><center>ID</center></th>
                    <th><center>ชื่อ</center></th>
                    <th><center>นามสุกล</center></th>
                    <th><center>เพศ</center></th>
                    <th><center>E-mail</center></th>
                    <th><center>เบอร์โทรศัพท์</center></th>
                    <th><center>ดำเนินการ</center></th>
                </thead>
                @foreach($Profiles as $profile)
                <tbody>
                <tr>
                    <td>{{ $profile->id}}</td>
                    <td>{{ $profile->fname}}</td>
                    <td>{{ $profile->lname }}</td>
                    <td>{{ $profile->gender }}</td>
                    <td><center>{{ $profile->email }}</center></td>
                    <td><center>{{ $profile->phone }}</center></td>

                    <td>
                        <center>
                        {{-- <a class="btn btn-warning" href="/SendDocuments/edit/{{$send->SendID}}" >EDIT</a> --}}
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
