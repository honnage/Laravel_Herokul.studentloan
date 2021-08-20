@extends('layouts.app')
@section('content')
    <div class="card card-default">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item">
                            @switch($error)
                                @case("The title field is required.")
                                    กรุณาใส่ข้อมูล หัวข้อ
                                    @break
                                @case("The description field is required.")
                                    กรุณาใส่ข้อมูล รายละเอียด 
                                    @break
                                @case("The content field is required.")
                                    กรุณาใส่ข้อมูล เนื้อหา
                                    @break
                                @case("The image field is required.")
                                    กรุณาใส่ข้อมูล รูปภาพ 
                                    @break
                                @case("The title has already been taken.")
                                    หัวข้อนี้ถูกนำไปใช้แล้ว
                                    @break

                                @default
                                    {{$error}}
                                    @break
                            @endswitch                            
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-header">
            {{isset($posts)? "Edit Post":"Create Post"}}
        </div>
        <div class="card-body">
            <form action="{{isset($posts)?"/posts/update/$posts->id":"/posts/store"}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @if(@isset($posts))
                    {{-- @method('PUT') --}}
                @endif
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{isset($posts)?"$posts->title":''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" rows="4" cols="4" class="form-control">{{isset($posts)?"$posts->description":''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input id="x" value="{{isset($posts)?"$posts->content":''}}" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" value="" class="form-control">
                </div>

                <div class="form-group">
                    {{-- {{$posts->category_id}} --}}
                    <label for="">Category</label>
                    <select class="form-control" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($posts))
                                    @if($category->id == $posts->category_id)
                                        selected
                                    @endif
                                @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                @if($tags->count()>0)
                <div class="form-group">
                    <label for="title">Tags</label>
                    <select class="form-control js-example-basic-multiple" name="tags[]" id="select-tags" multiple="multiple">
                            @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                      @if(isset($posts))
                                          @if($posts->hasTag($tag->id))
                                              selected
                                          @endif
                                      @endif

                                      >{{$tag->name}}</option>
                            @endforeach
                    </select>
              </div>
                @endif
                

                <div class="form-group">
                    <input type="submit" name="" value="{{isset($posts)? "Update Post":"Create Post"}}" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">


    <script type="text/javascript">
        $(document).ready(function() {
            $('#select-tags').select2();
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection