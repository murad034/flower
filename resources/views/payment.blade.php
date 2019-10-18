@extends('admin.layout.welcomeMaster')

@section('content')









    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill Up</div>

                    <h2>Bikash  Number-01515640087 for Flower Order</h2>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'payment/save','files' => true]) !!}


                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"   required autofocus>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="location" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location"   required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control" name="contact"   required autofocus>

                                </div>
                            </div>
                        <div class="form-group">
                            <label for="transaction" class="col-md-4 control-label">Transaction Id</label>

                            <div class="col-md-6">
                                <input id="transaction" type="text" class="form-control" name="transaction"   required autofocus>

                            </div>
                        </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        CheckOut
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
