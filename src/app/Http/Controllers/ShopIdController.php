<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;

class ShopIdController extends Controller
{

        public function shopIdView($id)
    {
        $userId = Auth::id();
        $user = User::find($userId); // ログインユーザーの情報を取得
        $shop = Shop::find($id); // idによる店舗の検索

        return view('shop_id', ['user' => $user, 'shop' => $shop]);
    }

        public function shopId(Request $request)
    {

        $reserve = new Reserve();
        $reserve->date = $request->date;
        $reserve->time = $request->time;
        $reserve->people = $request->people;
        $reserve->shop_id = $request->shop_id;
        $reserve->user_id = $request->user_id;
        $reserve->save();

    return redirect()->route('reservations.index')->with('success', '予約が追加されました。');

    }



}
