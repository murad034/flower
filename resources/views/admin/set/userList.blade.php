@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

       <!-- <div class="col-12">
            <a class="btn btn-default text-right" href="{{url('users/add')}}">Add User</a>

        </div>  -->

        <div class="row">
            <div class="col-12 table-responsive"></div>
            <table class="table table-condensed">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>User Type</th>
                    <th>ACTION</th>
                </tr>


                    @foreach($userss as $user)

                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        @if($user->userType==2)
                            <th>Admin</th>
                        @elseif($user->userType==1)
                                <th>Business Man</th>
                        @else
                            <th>User</th>
                        @endif

                        <th>
                            <a href="{{url('users/edit').'?id='.$user->id}}">Edit /</a>
                            <a href="{{url('users/delete').'?id='.$user->id}}">Delete</a>
                        </th>
                    </tr>

       @endforeach



            </table>


        </div>

    </div>

@endsection