@extends('layouts.inner')

@section('css2')
<link rel="stylesheet" href="{{ asset('css/shop_card.css') }}" />
@endsection


@section('content2')
<div>
    <div class="contact-form__heading">
        <span>{{ Auth::user()->name }}さん</span>
    </div>

    <div class="name">
        <a>予約状況</a>
    </div>

    @foreach($reserves as $reserve)
        <table>
            <tr>
                <td>予約{{ $loop->iteration }}:</td>
                <td>{{ $reserve->shop->name }}</td>
                <td>{{$reserve['date']}}</td>
                <td>{{$reserve['time']}}</td>
                <td>{{$reserve['people']}}</td>
                <td>
                    <form action="/done/{{ $reserve['id'] }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="form__button-submit" type="submit">×</button>
                    </form>
                </td>
            </tr>
        </table>
    @endforeach

    <div class="chef-image">
        <a>お気に入り店舗</a>
    </div>
        @foreach($favoriteShops as $shop)
            <tr>
                <td>
                    <img src="{{$shop['image_url']}}" >
                </td>
                <th>{{$shop['name']}}</th>
                <th>{{$shop['area'] == 1 ? '#東京都' : ($shop['area'] == 2 ? '#大阪府' : '#福岡県')}}</th>
                <th>{{$shop['genre'] == 1 ? '#イタリアン' : ($shop['genre'] == 2 ? '#ラーメン' : ($shop['genre'] == 3 ? '#居酒屋' : ($shop['genre'] == 4 ? '#寿司' : '#焼肉')))}}</th>
                <th>
                    <form class="form" method="post">
                    @csrf
                        <div class="form__button">
                            <button class="form__button-submit" type="button" data-id="{{ $shop['id'] }}">詳しく見る</button>
                        </div>
                    </form>
                </th>
                <th>
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
                </th>
            </tr>
        @endforeach

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form__button-submit').forEach(button => {
            button.addEventListener('click', function() {
                var shopId = this.getAttribute('data-id'); // ボタンのdata-id属性から店舗IDを取得
                window.location.href = '/detail/:shop_id/' + shopId; // リダイレクト先のURLを生成してリダイレクト
            });
        });
    });
    </script>
</div>
@endsection