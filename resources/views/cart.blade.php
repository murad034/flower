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
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>

                @if(isset($carts[0]))

                    @foreach($carts as $cart)

                        <tr>
                            <th>{{$cart->title}}</th>
                            <th><img width="200px" src="{{asset('/admin/uploads/'.$cart->image)}}"/></th>
                            <th>{{$cart->price}}</th>
                            <th>
                                <a href="{{url('cart/delete').'?id='.$cart->id}}">Delete</a>
                            </th>

                        </tr>
                    @endforeach
                @endif


            </table>


        </div>
    </div>






@endsection
