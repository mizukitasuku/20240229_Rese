<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function store($shopId)
    {
        $user = Auth::user();
        $user->favorites()->attach($shopId);
        return back()->with('success', 'お気に入りに追加しました。');
    }

    public function destroy($shopId)
    {
        $user = Auth::user();
        $user->favorites()->detach($shopId);
        return back()->with('success', 'お気に入りから削除しました。');
    }
}