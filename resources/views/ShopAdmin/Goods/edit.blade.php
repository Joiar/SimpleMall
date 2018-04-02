@extends('ShopAdmin.master')

@section('title', '编辑商品')

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" id="goodForm">
                <div class="alert alert-danger" id="errorAlert" style="display: none;">
                    <ul id="errorList"></ul>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>商品名称</label>
                            <input type="text" name="good[title]" value="{{$goodData->title}}" class="form-control" placeholder="请输入商品名称">
                        </div>
                        <div class="form-group col-md-6">
                            <label>商品价格</label>
                            <input type="number" name="good[price]" value="{{$goodData->price}}" class="form-control" placeholder="请输入商品价格">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>商品单位</label>
                            <input type="text" name="good[unit]" value="{{$goodData->unit}}" class="form-control" placeholder="请输入商品单位：个、件、只...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>商品库存</label>
                            <input type="number" name="good[store]" value="{{$goodData->store}}" class="form-control" placeholder="请输入商品库存">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>商品描述</label>
                        <textarea id="editor" name="good[desc]" style="visibility: hidden; display: none;">{{$goodData->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>商品图片</label>
                        <img height="100px" src="{{asset("$goodData->picture")}}" alt="">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-primary" id="updateGood">更新商品</button>
                    <a href="{{url('ShopAdmin/Goods')}}"><button type="button" class="btn btn-default">取消</button></a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
        <!-- /.box -->
    </div>
@endsection

@section('script')
    <script src="{{asset('ShopAdmin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor');
        });
        $('#updateGood').click(function () {
            $.ajax({
                url: '{{url("ShopAdmin/Goods/$goodData->id")}}',
                type: 'PATCH',
                data: $('#goodForm').serialize(),
                success: function(result) {
                    console.log(result);
                    if (result.status == 1) {
                        location.href = "{{url('ShopAdmin/Goods')}}";
                    } else {
                        alert('更新失败，请重试');
                    }
                },
                error: function(result){
                    var errors = result.responseJSON;
                    var errorDom = '';
                    $.each(errors.errors, function (index, value) {
                        console.log(value)
                        errorDom += '<li>' + value[0] + '</li>'
                    });
                    $('#errorList').html(errorDom);
                    $('#errorAlert').show();
                }
            });
        });
    </script>
@endsection