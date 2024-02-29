@extends('layouts.inner')

@section('css2')

@endsection


@section('content2')


<div class="form">
    <table>
        <thead>
            <tr>
                @if ($shop)
                    <td>{{$shop['name']}}</td>
                    <td><img src="{{$shop['image_url']}}" ></td>
                    <td>{{$shop['area'] == 1 ? '#東京都' : ($shop['area'] == 2 ? '#大阪府' : '#福岡県')}}</td>
                    <td>{{$shop['genre'] == 1 ? '#イタリアン' : ($shop['genre'] == 2 ? '#ラーメン' : ($shop['genre'] == 3 ? '#居酒屋' : ($shop['genre'] == 4 ? '#寿司' : '#焼肉')))}}</td>
                    <td>{{$shop['description']}}</td>
                @else
                    {{-- ショップが見つからない場合のメッセージ --}}
                    <p>Shop not found.</p>
                @endif
            </tr>
        </thead>
    </table>
    <form class="form__done" action="/done" method="post">
        @csrf
        <table>
            <tr>
                <div class="form__done-box">
                    <input type="date" name="date" id="date">
                </div>
                <div class="form-box">
                    <input type="time" name="time"  id="time">
                </div>
                <div class="form-box">
                    <input type="hidden" name="shop_id" value="{{ $shop['id'] }}" id="shop_id">
                    <input type="hidden" name="user_id" value="{{ $user['id'] }}" id="user_id">
                </div>
                <select name="people" id="people">
                    <option value="0">0人</option>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                </select>
                <td><div id="shop_id">{{$shop['name']}}</div></td>
                <td><div id="selectedDate"></div></td>
                <td><div id="selectedTime"></div></td>
                <td><div id="selectedPeople"></div></td>
                <script>
                    document.getElementById('people').addEventListener('change', updateSelectedPeople);
                    document.getElementById('time').addEventListener('input', updateSelectedTime);
                    document.getElementById('date').addEventListener('input', updateSelectedDate);
                        function updateSelectedPeople() {
                        var selectedPeople = document.getElementById('people').value; // 選択された人数を取得
                        document.getElementById('selectedPeople').textContent = selectedPeople + "人"; // 人数を更新
                    }

                    function updateSelectedTime() {
                         var selectedTime = document.getElementById('time').value; // 入力された時間を取得
                        document.getElementById('selectedTime').textContent = selectedTime; // 時間を更新
                    }

                    function updateSelectedDate() {
                        var selectedDate = document.getElementById('date').value; // 入力された日付を取得
                        document.getElementById('selectedDate').textContent = selectedDate; // 日付を更新
                    }
                </script>
            </tr>
        </table>
        <div class="form__button">
            <button class="form__button-submit"  type="submit">
                予約する
            </button>
        </div>
    </form>
</div>

@endsection