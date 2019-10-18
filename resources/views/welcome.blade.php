@extends('admin.layout.welcomeMaster')


@section('content')


<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->

                @if(isset($flowers[0]))
                    @foreach($flowers as $flower)

                <div class="banner banner-1">
                    <img width="400px" src="{{asset('/admin/uploads/'.$flower->image)}}"/>
                    <div class="banner-caption text-center">
                        <h1>{{$flower->title}}</h1>
                        <h3 class="white-color font-weak">Up to 50% Discount</h3>
                        {!! Form::open(['url' => ('cart/save').'?id='.$flower->id,'files' => true]) !!}
                        <button type="submit" class="primary-btn">Shop Now</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /banner -->

                @endforeach
            @endif
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->



@for($i=1;$i<=$userID;++$i)

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

        @if(isset($flowerTwo[0]))
            @foreach($flowerTwo as $flower)
                @if($i==$flower->userId&&$flower->userId!=null)
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Flower Collection</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img width="400px" src="{{asset('/admin/uploads/'.$flower->image)}}"/>
                    <div class="banner-caption">
                        <h2 class="white-color">NEW<br>COLLECTION</h2>
                        {!! Form::open(['url' => ('cart/save').'?id='.$flower->id,'files' => true]) !!}

                        <button type="submit" class="primary-btn">Shop Now</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /banner -->
                    @break
                @endif
            @endforeach
        @endif


            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">

                    <div id="product-slick-1" class="product-slick">
                        <!-- Product Single -->
                        @if(isset($flowerTwo[0]))
                            @foreach($flowerTwo as $flower)
                                @if($i==$flower->userId&&$flower->userId!=null)
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-20%</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img width="400px" src="{{asset('/admin/uploads/'.$flower->image)}}"/>

                            </div>
                            <div class="product-body">
                                <h3 class="product-price">{{$flower->price}} taka <del class="product-old-price"></del></h3>
                                <h2 class="product-name"><a href="#">{{$flower->title}} </a></h2>
                                <div class="product-btns">

                                {!! Form::open(['url' => ('cart/save').'?id='.$flower->id,'files' => true]) !!}
                                    <!--if(!empty($flower))  -->

                                    <!--endif-->
                                <!--button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button-->
                                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>   Add to Cart</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                            @endif
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->


    </div>
    <!-- /container -->
</div>
<!-- /section -->


@endfor

@endsection
