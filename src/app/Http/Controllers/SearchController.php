<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shop;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();
        $area = $request->input('area');
        $genre = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::query();

        // エリアの条件を適用
        if ($area) {
            $query->where('area', $area);
        }

        // ジャンルの条件を適用
        if ($genre) {
            $query->where('genre', $genre);
        }

        // 店舗名の条件を適用
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        $shops = $query->get();

        return view('shop_all', ['user' => $user, 'shops' => $shops]);
    }
}
