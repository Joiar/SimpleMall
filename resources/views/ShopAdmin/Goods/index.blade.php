@extends('ShopAdmin.master')

@section('title', '商品列表')

@section('content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>商品ID</th>
                        <th>商品图片</th>
                        <th>商品名</th>
                        <th>商品价格</th>
                        <th>库存</th>
                        <th>添加时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    @forelse ($goodsList as $good)
                        <tr>
                            <td>{{$good->id}}</td>
                            <td><img height="60px" src="{{asset("$good->picture")}}" alt="商品图片"></td>
                            <td>{{$good->title}}</td>
                            <td>¥ {{$good->price}}</td>
                            <td>{{$good->store}}</td>
                            <td>{{$good->created_at}}</td>
                            <td>{{$good->updated_at}}</td>
                            <td>
                                @if($good->status == 'ON')
                                    <button class="btn btn-warning btn-sm changeStatus-btn" data-id="{{$good->id}}">下架</button>
                                @else
                                    <button class="btn btn-success btn-sm changeStatus-btn" data-id="{{$good->id}}">上架</button>
                                @endif
                                <a href="{{url("ShopAdmin/Goods/$good->id/edit")}}"><button class="btn btn-primary btn-sm">编辑</button></a>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{$good->id}}">删除</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">暂无数据</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{ $goodsList->links() }}
            </div>
            <!-- /.box-foot -->
        </div>
        <!-- /.box -->
    </div>
@endsection

@section('script')
    <script>
        $('.delete-btn').click(function () {
            var deleteUrl = "{{url('ShopAdmin/Goods')}}" + '/' + $(this).attr('data-id');
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(result) {
                    if (result.status == 1) {
                        location.reload();
                    } else {
                        alert('删除失败，请重试');
                    }
                }
            });
        });

        $('.changeStatus-btn').click(function () {
            var changeStatusUrl = "{{url('ShopAdmin/Goods/changeSatatus')}}" + '/' + $(this).attr('data-id');
            $.ajax({
                url: changeStatusUrl,
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(result) {
                    if (result.status == 1) {
                        location.reload();
                    } else {
                        alert('状态更改失败，请重试');
                    }
                }
            });
        });
    </script>
@endsection