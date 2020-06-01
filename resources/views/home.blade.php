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
                    <p><strong>Email : </strong>{!! Auth::user()->id !!}</p>
                    <p><strong>Email : </strong>{!! Auth::user()->email !!}</p>

                    @if( Auth::user()->StatusID == 1)
                        <p><strong>สถานะ : </strong>Admin</p>
                    @else
                        <p><strong>สถานะ : </strong>User</p>
                    @endif
                    {{-- {{$users->id}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
