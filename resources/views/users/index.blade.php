@extends('layouts.app')
@section('content')
    {{-- <div class="d-flex justify-content-end mb-2">
        <a href="/tags/create" class="btn btn-success">Add Tag</a>
    </div> --}}
    <div class="card-default">
        <div class="card-header">
            User   {{ Auth::user()->username }}               
        </div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
        
                    @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        
                        @if(Auth::user()->username != $user->username)
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="users/changeAdmin/{{$user->id}}" method="post">
                                        {{csrf_field()}}
                                        <center><button type="submit" class="btn btn-success">Change Admin</a></center>
                                    </form>
                                @else
                                    <form action="users/changeUser/{{$user->id}}" method="post">
                                        {{csrf_field()}}
                                        <center><button type="submit" class="btn btn-primary">Change User</a></center>
                                    </form>
                                @endif
                            </td>
                        @else
                            <td>
                                {{-- สถานะของ username ปัจจุบัน  --}}
                            </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text text-center">No User</h3>
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