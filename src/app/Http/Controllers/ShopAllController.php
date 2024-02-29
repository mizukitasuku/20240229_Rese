<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopAllController extends Controller
{
    public function shopAllView()
    {
        $user = Auth::user();
        $shops = Shop::all();

        return view('shop_all', ['user' => $user, 'shops' => $shops]);
    }
}
