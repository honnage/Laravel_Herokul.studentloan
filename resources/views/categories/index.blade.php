@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="/categories/create" class="btn btn-success">Add Category</a>
    </div>
    <div class="card-default">
        <div class="card-header">
            Category
        </div>
        <div class="card-body">
            @if($categories->count()>0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Post Counts</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
        
                    @foreach($categories as $category)
                    <tbody>
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td>
                            <a class="btn btn-warning" href="categories/edit/{{$category->id}}">Edit</a>
                        </td>
                        <td>
                            <form class="delete_form" action="categories/destroy/{{$category->id}}" method="post">
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
                <h3 class="text text-center">No Category</h3>
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