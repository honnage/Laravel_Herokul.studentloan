@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">ประเภทการกู้ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <a style="float:right " class="btn btn-success mr-2 "href="{{ route('LoanType.create') }}" >เพิ่มข้อมูล</a><br> --}}
                <a class="btn btn-success mr-2 "href="{{ route('LoanType.create') }}" >เพิ่มข้อมูล</a><br>

            </div>

        @csrf

            <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>#ID</center></th>
                    <th><center>ประเภท</center></th>
                    <th><center>ชื่อย่อ</center></th>
                    <th><center>ค่าครองชีพ</center></th>
                    <th><center>ดำเนินการ</center></th>
                </thead>
                @foreach($loantype as $type)
                <tbody>
                <tr>
                    <td>{{ $type->id}}</td>
                    <td>{{ $type->type }}</td>
                    <td><center>{{ $type->code }}</center></td>
                    <td>{{ number_format($type->salary) }} / เดือน</td>
                    <td>
                        <center>
                        <form action="{{ route('LoanType.destroy',$type->id)}}" method="POST">
                            <a class="btn btn-warning" href="{{ route('LoanType.edit',$type->id) }}" >EDIT</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >DELETE</button>
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
@endsection
