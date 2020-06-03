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
                    <th><center>ID</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>Email</center></th>
                    <th><center>ดำเนินการ</center></th>
                </thead>
                @foreach($users as $user)
                <tbody>
                <tr>
                    <td>{{ $user->id}}</td>
                    <td><center>{{ $user->StatusID }}</center></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <center>
                        {{-- <a href="/Profiles/editStatusUser/{{$user->id}}" class="btn btn-success">แสดงข้อมูล</a> --}}
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
