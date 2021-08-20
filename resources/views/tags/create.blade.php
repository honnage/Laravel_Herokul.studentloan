@extends('layouts.app')
@section('content')
    <div class="card card-default">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item">
                            @if($error == "The name has already been taken.")
                                ชื่อนี้ถูกนำไปใช้แล้ว
                            @elseif($error = " ")
                                กรุณาใส่ชื่อหัวข้อ
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-header">
            {{isset($tag)? "Edit Tag":"Create Tag"}}
        </div>
        <div class="card-body">
            <form action="{{isset($tag)?"/tags/update/$tag->id":"/tags/store"}}" method="post">
                {{csrf_field()}}
                @if(@isset($tag))
                    {{-- @method('PUT') --}}
                @endif
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{isset($tag)?"$tag->name":''}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="" value="{{isset($tag)? "Update Tag":"Add Tag"}}" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection