@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    ข้อมูลผู้ใช้ &nbsp;&nbsp;&nbsp;
                </div>
                @csrf
                <body {{--class="text-center"--}} style="">
                <table class="table" border="0">
                    <thead class="thead-dark">
                        <th><center>#ID</center></th>
                        {{-- <th><center>รหัสรายการ</center></th> --}}
                        {{-- <th><center>profile_id</center></th> --}}
                        <th><center>ชื่อ</center></th>
                        <th><center>นามสุกล</center></th>
                        <th><center>เบอร์โทร</center></th>
                        <th><center>Email</center></th>
                        {{-- <th><center>ยอดเงินรวม</center></th> --}}
                        <th><center>ดำเนินการ</center></th>
                    </thead>
                    @foreach($Profiles as $profile)
                    <tbody>
                    <tr>
                        <td>{{ $profile->id}}</td>
                        {{-- <td>{{ $profile->SendDocuments_id }}</td> --}}
                        <td>{{ $profile->fname }}</td>
                        <td>{{ $profile->lname }}</td>
                        <td>{{ $profile->phone }}</td>
                        <td>{{ $profile->email }}</td>
                        {{-- <td>{{ $data->id }}</td> --}}
                        {{-- <td>{{ number_format($profile->total) }}</td> --}}
                        <td>
                            <center>
                            @if(sizeof($Profiles) != 0)
                                <a class="btn btn-success" href="/Accounts/showAdmin/{{$profile->id}}" >SHOW</a>
                            @else

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
</div>
@endsection
