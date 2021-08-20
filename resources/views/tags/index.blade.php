@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="/tags/create" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            @if($tags->count()>0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Tag Counts</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
        
                    @foreach($tags as $tag)
                    <tbody>
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts->count() }}</td>
                        <td>
                            <a class="btn btn-warning" href="tags/edit/{{$tag->id}}">Edit</a>
                        </td>
                        <td>
                            <form class="delete_form" action="tags/destroy/{{$tag->id}}" method="post">
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