@extends('admin.layout.master')

@section('content')



    <div class="container-fluid">

        <div class="col-12">
            <a class="btn btn-default text-right"  href="{{url('flower/add')}}">Add Flower</a>
        </div>

        <div class="row">
            <div class="col-12 table-responsive">

                {!! Form::open(['url' => 'flower/save','files' => true]) !!}

                @if(!empty($flower))
                    <input type="hidden" name="id" value="{{$flower->id}}">
                @endif

                <div class="form-group mt-30">

                    <label>Title</label>
                    <input type="text" name="title" value="@if(!empty($flower)){{$flower->title}} @endif" class="form-control" placeholder="title">
                </div>

                    <div class="form-group mt-30">

                        <label>Image</label>

                        <input type="file" name="image" class="form-control" placeholder="image">
                        @if(!empty($flower->image))
                            <img width="100px" src="{{asset('admin/uploads/'.$flower->image)}}">
                            @endif


                    </div>

                    <div class="form-group mt-30">
                        <label>Price</label>
                        <input type="text" name="price" value="@if(!empty($flower)){{$flower->price}} @endif" class="form-control" placeholder="price">
                    </div>



                 <div class="form-group mt-30">

                     <label>Description</label>
                     <input type="text" name="description" value="@if(!empty($flower)) {{$flower->description}} @endif" class="form-control" placeholder="description">

                 </div>




                <button type="submit" class="btn btn-primary btn-block reg-btn">Submit Now</button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection