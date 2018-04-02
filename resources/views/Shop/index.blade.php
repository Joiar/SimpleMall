@extends('Shop/master')

@section('title', '首页')

@section('style')
    <style>
        body{
            background: #fff;
        }
        .center{
            width: 1200px;
            margin: 0 auto;
            margin-top: 20px;
        }
        .boxText{
            width: 750px;
            margin:0 auto;
        }
    </style>
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('Shop/images/banner.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('Shop/images/banner2.jpg')}}" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="center">
        <div class="boxText">
            <div style="text-align: center;margin-top: 4rem">
                <span style="font-size: 30px;line-height: 40px;">NEW TODAY</span>
            </div>
            <div style="text-align: center;margin-bottom: 5rem">
					<span style="font-size: 30px;line-height: 40px;">
						————————   今日上新   ————————
					</span>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @forelse($goodsList as $good)
                    <div class="card col-md-3 col-xs-9" style="margin-bottom: 15px;">
                        <a href='{{url("/Good/$good->id")}}'>
                            <img class="card-img-top" src="{{asset($good->picture)}}" height="300px;" alt="商品图片">
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="color: #666">{{$good->title}}</p>
                            <h5 class="card-title" style="color: red">¥ {{$good->price}}</h5>
                        </div>
                    </div>
                @empty
                    <p>没有商品</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection