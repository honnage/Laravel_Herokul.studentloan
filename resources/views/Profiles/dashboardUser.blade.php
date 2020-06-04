@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session()->get('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">ข้อมูลผู้ใช้ในระบบ&nbsp;&nbsp;&nbsp;</div>
                @csrf
                <body {{--class="text-center"--}} style="">
                <table class="table " border="0">
                    <thead class="thead-dark">
                        <th><center>ID</center></th>
                        <th><center>สถานะ</center></th>
                        <th><center>Email</center></th>
                        <th><center>ดำเนินการ</center></th>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>
                            {{-- <center>{{ $user->StatusID }}</center> --}}
                            @if($user->id == "1")
                                Admin
                            @elseif( $user->StatusID == 2)
                                Admin
                            @elseif( $user->StatusID == 1)
                                Moderator
                            @else
                                User
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <center>
                            <a href="/User/editStatus/{{$user->id}}" class="btn btn-success">แสดงข้อมูล</a>
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
