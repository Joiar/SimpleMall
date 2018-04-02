<?php

namespace App\Http\Controllers\ShopAdmin;

use App\Http\Requests\StoreGoodPost;
use App\Http\Requests\UpdateGoodPatch;
use App\Models\Good;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodsList = Good::paginate(6);
        $pageData['goodsList'] = $goodsList;
        return view('ShopAdmin/Goods/index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ShopAdmin/Goods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoodPost $request)
    {
        $Good = new Good();
        $picturePath = $request->file('picture')->store('/GoodsPic');
        $Good->title = $request->title;
        $Good->price = $request->price;
        $Good->unit = $request->unit;
        $Good->store = $request->store;
        $Good->picture = 'uploads/'.$picturePath;
        $Good->desc = $request->desc;
        $storeRes = $Good->save();
        if ($storeRes) {
            return redirect('ShopAdmin/Goods')->with('success', '添加成功！');
        } else {
            return redirect('ShopAdmin/Goods/create')->with('error', '添加失败！')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goodData = Good::find($id);
        $pageData['goodData'] = $goodData;
        return view('ShopAdmin/Goods/edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoodPatch $request, $id)
    {
        $Good = Good::find($id);
        $updateList = $request->good;
        foreach ($updateList as $k => $v) {
            $Good->$k = $v;
        }
        $updateRes = $Good->save();
        if ($updateRes) {
            $result = [
                'status' => 1,
                'msg' => '更新成功',
                'data' => []
            ];
        } else {
            $result = [
                'status' => 0,
                'msg' => '更新失败',
                'data' => []
            ];
        }
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyRes = Good::destroy($id);
        if ($destroyRes) {
            $result = [
                'status' => 1,
                'msg' => '删除成功',
                'data' => []
            ];
        } else {
            $result = [
                'status' => 0,
                'msg' => '删除失败',
                'data' => []
            ];
        }
        return response()->json($result);
    }

    public function changeGoodStatus($id)
    {
        $Good = Good::find($id);
        $Good->status = $Good->status == 'ON' ? 'OFF' : 'ON';
        $changeRes = $Good->save();
        if ($changeRes) {
            $result = [
                'status' => 1,
                'msg' => '状态更改成功',
                'data' => []
            ];
        } else {
            $result = [
                'status' => 0,
                'msg' => '状态更改失败',
                'data' => []
            ];
        }
        return response()->json($result);
    }
}
