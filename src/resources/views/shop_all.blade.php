@extends('layouts.inner')

@section('css2')
<link rel="stylesheet" href="{{ asset('css/shop_card.css') }}" />
@endsection


@section('content2')
<form class="form__search" action="{{ route('search') }}" method="GET">
    <select name="area">
        <option value=""></option>
        <option value="1">東京都</option>
        <option value="2">大阪府</option>
        <option value="3">福岡県</option>
    </select>
    <select name="genre">
        <option value=""></option>
        <option value="1">イタリアン</option>
        <option value="2">ラーメン</option>
        <option value="3">居酒屋</option>
        <option value="4">寿司</option>
        <option value="5">焼肉</option>
    </select>
    <input type="text" name="keyword" placeholder="店舗名を入力してください">
    <button type="submit">検索</button>
</form>

<div class=shop__card>
    @foreach($shops as $shop)
        <tr>
            <td>
                <div class=shop__card--img>
                    <img src="{{$shop['image_url']}}" >
                </div>
            </td>
            <td>{{$shop['name']}}</td>
            <td>{{$shop['area'] == 1 ? '#東京都' : ($shop['area'] == 2 ? '#大阪府' : '#福岡県')}}</td>
            <td>{{$shop['genre'] == 1 ? '#イタリアン' : ($shop['genre'] == 2 ? '#ラーメン' : ($shop['genre'] == 3 ? '#居酒屋' : ($shop['genre'] == 4 ? '#寿司' : '#焼肉')))}}</td>
            </tr>
            <form class="form" method="POST">
                @csrf
            <div class="form__button">
                <button class="form__button-submit" type="button" data-id="{{ $shop['id'] }}">詳しく見る</button>
            </div>
        </form>
        <div class="shop">
            {{-- お気に入りの状態に応じて条件分岐 --}}
            @if ($user->favorites->contains($shop->id))
                <form action="{{ route('favorites.destroy', $shop->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">お気に入り解除</button>
                </form>
                @else
                <form action="{{ route('favorites.store', $shop->id) }}" method="POST">
                    @csrf
                    <button type="submit">お気に入りに追加</button>
                </form>
            @endif
        </div>
    @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.form__button-submit').forEach(button => {
        button.addEventListener('click', function() {
            var shopId = this.getAttribute('data-id');
            window.location.href = '/detail/:shop_id/' + shopId;
        });
    });
});
</script>
@endsection




