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
            {{isset($category)? "Edit Category":"Create Category"}}
        </div>
        <div class="card-body">
            <form action="{{isset($category)?"/categories/update/$category->id":"/categories/store"}}" method="post">
                {{csrf_field()}}
                @if(@isset($category))
                    {{-- @method('PUT') --}}
                @endif
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{isset($category)?"$category->name":''}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="" value="{{isset($category)? "Update Category":"Add Category"}}" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection