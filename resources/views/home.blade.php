@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <p><strong>Name : </strong>{!! Auth::user()->name !!}</p> --}}
                    <p><strong>ID : </strong>{!! Auth::user()->id !!}</p>
                    <p><strong>Email : </strong>{!! Auth::user()->email !!}</p>

                    @if( Auth::user()->StatusID == 1)
                        <p><strong>สถานะ : </strong>Admin</p>
                    @else
                        <p><strong>สถานะ : </strong>User</p>
                    @endif

                    @if(Auth::user()->checkIsStatus() || Auth::user()->id == "1")
                        <a href="SendDocuments/dashboard" class="btn btn-primary col-sm-2">Management</a>
                    @endif

                    @if( sizeof($profiles) == 1  )
                        <a href="{{ route('Profiles.edit',Auth::user()->id ) }} " class="btn btn-outline-secondary" style="background: #FEC748; color: white ">แก้ไขข้อมูลส่วนตัว</a>
                    @else
                        <a href="{{ route('Profiles.create') }} " class="btn btn-info">เพื่มข้อมูลส่วนตัว</a>
                    @endif


                    @if(sizeof($profiles ) == 0)
                        <a href="{{Auth::user()->id}}" onclick="return confirm('คุณยังไม่ได้เพื่มข้อมูลส่วนตัว \nกรุณาเพื่มข้อมูลส่วนตัวก่อน ไม่งั้นไม่สามารถทำการ ส่งเอกสารได้')" class="btn btn-danger">ส่งเอกสาร</a>
                    @else
                        {{-- <a href="{{ route('SendDocument.create') }} " class="btn btn-outline-secondary" style="background: #AEC33A; color: white ">ส่งเอกสาร</a> --}}
                        <a href="" class="btn btn-outline-secondary" style="background: #AEC33A; color: white ">ส่งเอกสาร</a>
                    @endif


                    {{-- @if( sizeof($accounts) == 0  )

                    @else
                        <a href="{{ route('SendDocument.show',Auth::user()->id ) }} " class="btn btn-outline-secondary" style="background: #0AC8DC; color: white ">แก้ไขเอกสาร</a>
                        <a href="{{ route('Profiles.show',Auth::user()->id ) }} " class="btn btn-outline-secondary" style="background: #2C439B; color: white ">ประวัติการกู้ </a>
                    @endif --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
