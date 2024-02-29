<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;

class MyPageController extends Controller
{
        public function myPageView()
    {
        $user = Auth::user();

        $favoriteShops = $user->favoriteShops;

        $reserves = $user->reserves()->get();

        $shops = Shop::all();

        return view('my_page', [
            'user' => $user,
            'favoriteShops' => $favoriteShops,
            'reserves' => $reserves,
            'shops' => $shops
        ]);
    }

        public function destroy($id)
    {

        $reserve = Reserve::findOrFail($id);
        $reserve->delete();

        return redirect()->back()->with('success', '予約が削除されました。');
    }
}
