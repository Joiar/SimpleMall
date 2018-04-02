<?php

namespace App\Http\Controllers\Shop;

use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $goodsList = Good::where('status', 'ON')->get();
        $pageData['goodsList'] = $goodsList;
        return view('Shop.index', $pageData);
    }

    public function goodDetail($id)
    {
        $goodData = Good::find($id);
        $pageData['goodData'] = $goodData;
        return view('Shop.goodDetail', $pageData);
    }
}
