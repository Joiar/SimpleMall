@extends('Shop/master')

@section('title', '商品详情')

@section('content')
    <div style="width: 1200px;margin: 0 auto;margin-top: 3rem;margin-bottom: 5rem;display: flex;">
        <div style="width: 500px;float:left;height: 500px;">
            <img src="{{asset($goodData->picture)}}" style="height: 500px;display: block; margin: 0 auto;">
        </div>
        <div style="margin-left: 5rem;width:550px;float:left;">
            <div>
                <span style="font-weight: normal;color: #585858;font-size: 20px;text-align: left;word-break: break-word;">{{$goodData->title}}</span>
            </div>
            <div style="margin-top: 30px;">
                <table>
                    <tr>
                        <td style="width: 100px;line-height: 42px;text-align: right;position: relative;color: #666;">价格：</td>
                        <td style="font-size: 40px;color: #f13a3a;padding-left: 20px">¥ {{$goodData->price}}</td>
                    </tr>
                    <tr style="height: 20px"></tr>
                    <tr>
                        <td style=";line-height: 42px;text-align: right;color: #666;">库存：</td>
                        <td style="color: #666;">{{$goodData->store}}</td>
                    </tr>
                    <tr style="height: 25px"></tr>
                    <tr>
                        <td style=";line-height: 42px;text-align: right;color: #666;">购买数量：</td>
                        <td>
                            <div class="btn-group btn-group-lg" role="group">
                                <button>-</button>
                                <button class="disabled">1</button>
                                <button>+</button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="margin-top: 8rem">
                    <button type="button" class="btn btn-outline-primary">加入购物车</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 5rem;width: 105px">购买</button>
                </div>
            </div>
        </div>
    </div>
    <div style="display:flex;width: 1200px;margin:0 auto;border: 1px solid #e0e0e0;height: 120px;margin-bottom: 3rem;">
        <div style="width: 1200px;margin: 0 auto">
            <div style="line-height: 40px;text-align: center;margin-top: 1.5rem;">
                <p style="font-size: 30px;">商品详情</p>
            </div>
            <div style="text-align: center;margin-top: 10px">
                <span style="color: #666">{!! $goodData->desc !!}</span>
            </div>
        </div>
    </div>
@endsection