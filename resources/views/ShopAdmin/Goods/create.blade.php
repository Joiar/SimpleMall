@extends('ShopAdmin.master')

@section('title', '发布商品')

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="{{url('ShopAdmin/Goods')}}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>商品名称</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="请输入商品名称">
                        </div>
                        <div class="form-group col-md-6">
                            <label>商品价格</label>
                            <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="请输入商品价格">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>商品单位</label>
                            <input type="text" name="unit" value="{{old('unit')}}" class="form-control" placeholder="请输入商品单位：个、件、只...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>商品库存</label>
                            <input type="number" name="store" value="{{old('store')}}" class="form-control" placeholder="请输入商品库存">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>商品描述</label>
                        <textarea id="editor" name="desc" style="visibility: hidden; display: none;">{{old('desc')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>商品图片</label>
                        <input type="file" name="picture">
                        <p class="help-block">请上传png、jpg格式图片，并且大小在2M以内</p>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">发布商品</button>
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
    </script>
@endsection