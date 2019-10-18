@extends('admin.layout.master')

@section('content')

    <div class="register-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1 col-12">
                    <div class="register">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 col-12">
                                <div class="class=col-md-6">
                                    <h4 class="fw-7">User Details</h4>
                                </div>
                            </div>
                        </div>


                                {!! Form::open(['url' => 'users/save' ]) !!}

                            @if(!empty($userss))
                                <input type="hidden" name="id" value="{{$userss->id}}">
                            @endif

                            <div class="form-group mt-30">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                <input type="text" name="name"  value="@if(!empty($userss)) {{$userss->name}} @endif" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mt-30">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">

                                <input type="email" name="email"  value="@if(!empty($userss)) {{$userss->email}} @endif" class="form-control">
                                </div>
                                </div>



                        <div class="form-group">
                            <label class="col-md-4 control-label">User Type</label>

                            <div class="col-md-6">

                                <select name="userType" class="form-control">
                                    @if(!empty($userss))

                                        <option @if($userss->userType==2) selected @endif value=2>Admin</option>
                                        <option @if($userss->userType==1) selected @endif value=1>Business Man</option>
                                        <option @if($userss->userType==0) selected @endif value=0>User</option>
                                    @else
                                    <option value="2">Admin</option>
                                    <option value="1">Business Man</option>
                                    <option value="0">User</option>

                                    @endif
                                </select>

                            </div>
                        </div>




                        <div class="form-group mt-30">


                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block reg-btn">Submit Now</button>

                            </div>
                        </div>


                        {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection