<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 控制面板
    public function dashboard() {
        return view('ShopAdmin/dashboard');
    }
}
