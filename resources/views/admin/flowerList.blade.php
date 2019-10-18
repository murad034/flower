@extends('admin.layout.master')

@section('content')


    <div class="container-fluid">

        <div class="col-12">
            <a class="btn btn-default text-right"  href="{{url('flower/add')}}">Add Flower</a>

        </div>


        <div class="row">
            <div class="col-12 table-responsive"></div>
            <table class="table table-condensed">
                <tr>
                    @if($users->userType==2)
                    <th>User ID</th>
                    @endif
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>IMAGE</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>

                @if(isset($flowers[0]))

                    @foreach($flowers as $flower)

                <tr>
                    @if($users->userType==2)
                    <th>{{$flower->userId}}</th>
                    @endif
                    <th>{{$flower->id}}</th>
                    <th>{{$flower->title}}</th>
                    <th><img width="400px" src="{{asset('/admin/uploads/'.$flower->image)}}"/></th>
                    <th>{{$flower->price}}</th>
                    <th>{{$flower->description}}</th>

                    <th>
                        <a href="{{url('flower/edit').'?id='.$flower->id}}">Edit/</a>
                        <a href="{{url('flower/delete').'?id='.$flower->id}}">Delete</a>
                    </th>
                </tr>
                    @endforeach
                @endif


            </table>


        </div>
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        <!-- <li class="page-item"><a class="page-link" href="#">04</a></li>  -->
                    </ul>
                </nav>
            </div>
        </div>
        </div>







    @endsection