@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>User_id</th>
                                <th>Name</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($leaveinfo  as $leaves)
                        <tr>
                        <td>
                             {{$leaves->id}}
                        </td>
                        <td>
                             {{$leaves->name}}
                        </td>
                        <td>
                             {{$leaves->reason}}
                        </td>
                        <td>
                                <div class="row mb-1">
                                <div class="col-md-4 ">
                                <form method="POST" action='status-update'>
                                @csrf
                                <input type ='hidden' name="status" value='Approved' >
                                <input type ='hidden' name="user_id" value='{{$leaves->id}}' >
                                <input type ='hidden' name="row_id" value='{{$leaves->rowid}}' >
                                <input type ='hidden' name="toemail" value='{{$leaves->email}}' >
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Accept') }}
                                    </button>
                                    </form>
                                </div>
                                <div class="col-md-4 ">

                                <form method="POST" action='status-update'>
                                    @csrf
                                <input type ='hidden' name="status" value='Rejected' >
                                <input type ='hidden' name="user_id" value='{{$leaves->id}}' >
                                <input type ='hidden' name="row_id" value='{{$leaves->rowid}}' >
                                <input type ='hidden' name="toemail" value='{{$leaves->email}}' >
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Reject') }}
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
