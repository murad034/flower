@extends('admin.layout.welcomeMaster')

@section('content')









    <div class="container-fluid">

        <!--div class="col-12">
            <a class="btn btn-default text-right"  href="{{url('flower/add')}}">Add Flower</a>

        </div-->


        <div class="row">
            <div class="col-12 table-responsive"></div>
            <table class="table table-condensed">
                <tr>

                    <th>TITLE</th>
                    <th>IMAGE</th>
                    <th>Description</th>
                    <th>PRICE</th>

                </tr>

                @if(isset($searches[0]))

                    @foreach($searches as $search)

                        <tr>
                            <th>{{$search->title}}</th>
                            <th><img width="300px" src="{{asset('/admin/uploads/'.$search->image)}}"/></th>
                            <th>{{$search->description}}</th>
                            <th>{{$search->price}}</th>

                        </tr>
                    @endforeach
                @endif


            </table>


        </div>
    </div>






@endsection
