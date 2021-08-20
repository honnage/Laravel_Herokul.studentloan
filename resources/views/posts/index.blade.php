@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="/posts/create" class="btn btn-success">Add Post</a>
    </div>
    <div class="card-default">
        <div class="card-header">
            Post
        </div>
        <div class="card-body">
            @if($posts->count()>0)
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
    
                @foreach($posts as $post)
                <tbody>
                <tr>
                    <td>
                        <img src="storage/{{$post->image}}" alt="" width="80px" height="80px">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="categories/edit/{{$post->category->id}}">{{ $post->category->name }}</a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="posts/edit/{{$post->id}}">Edit</a>
                    </td>
                    <td>
                        <form class="delete_form" action="posts/destroy/{{$post->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" class="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger" name="" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text text-center">No Post</h3>
        @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.delete_form').on('submit',function(){
                if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
                    return true;
                }else{
                    return false;
                }
            });
        });
    </script>

@endsection