@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session()->has('warning'))
                <div class="alert alert-danger" role="alert">
                    {{Session()->get('warning')}}
                </div>
            @endif
            @if(Session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session()->get('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header"><strong>เพื่มวิชา </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/LoanType/store" method="post" >
                        {{csrf_field()}}
                        <div class="form-inline">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                                <label class="col-sm-2">&nbsp; ประเภทการกู้เงิน :<label style="color:red;"> * </label></label>
                                <input type="text" class="form-control col-sm-10" name="type" id="type" placeholder="เช่น กองทุนเงินให้กู้ยืมเพื่อการศึกษา ">
                             </div>

                             <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                                <label class="col-sm-2">&nbsp; ชื่อย่อ :<label style="color:red;"> * </label></label>
                                <input type="text" class="form-control col-sm-10" name="code" id="code" placeholder="เช่น กยศ ">
                             </div>

                             <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                                <label class="col-sm-2">&nbsp; ค่าครองชีพ :<label style="color:red;"> * </label></label>
                                <input type="text" class="form-control col-sm-7" name="salary" id="salary" placeholder="เช่น 2400 ">

                                <button type="submit" name="submit" class="btn btn-success col-sm-2">เพื่มข้อมูล</button>
                                <button class="btn btn-secondary col-sm-1" type="reset">ยกเลิก</button>
                             </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 my-2">
            <div class="card">
                <div class="card-header">ประเภทการกู้ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{-- <a class="btn btn-success mr-2 "href="{{ route('LoanType.create') }}" >เพิ่มข้อมูล</a><br> --}}
                </div>
                @csrf
                <body {{--class="text-center"--}} style="">

                <table class="table" border="0">
                    <thead class="thead-dark">
                        {{-- <th><center>#ID</center></th> --}}
                        <th><center>ชื่อย่อ</center></th>
                        <th><center>ประเภท</center></th>
                        <th><center>ค่าครองชีพ</center></th>
                        <th><center>ดำเนินการ</center></th>
                    </thead>
                    @foreach($loantype as $type)
                    <tbody>
                    <tr>
                        {{-- <td>{{ $type->id}}</td> --}}
                        <td><center>{{ $type->code }}</center></td>
                        <td>{{ $type->type }}</td>
                        <td><center>{{ number_format($type->salary) }} / เดือน</center></td>
                        <td>
                            <center>
                            <form action="/LoanType/destroy/{{$type->id}}" method="GET">
                                <a class="btn btn-warning col-sm-5" href="/LoanType/edit/{{$type->id}}" >แก้ไข</a>
                                {{-- @csrf
                                @method('DELETE') --}}
                                @if(Auth::user()->StatusID == 2 || Auth::user()->id == 1)
                                    {{-- <button type="submit" class="btn btn-danger" >DELETE</button> --}}
                                    <input type="submit" value="ลบ" data-name="{{$type->code}}" class="btn btn-danger deleteform col-sm-5">
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
