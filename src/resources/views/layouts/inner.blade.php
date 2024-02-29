<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css2')
</head>

<body>
  @if (Auth::check())
  <button id="toggleMenuButton">□ Rese</button>
  <header class="header">
    <div id="menuContent" style="display: none;">
      <nav class="header__nav">
        <ul class="header__nav-box">
          <li><a href="/">Home</a></li>
          <li>
            <form class="form" action="/logout" method="post">
            @csrf
              <button class="header__nav-button">Logout</button>
            </form>
          </li>
          <li><a href="/my_page">Mypage</a></li>
        </ul>
      </nav>
    </div>
  </header>
    @yield('content3')
  <main>
    <div id="mainContent" style="display: block;">
    @yield('content2')
    </div>
  </main>
  <script>
    document.getElementById('toggleMenuButton').addEventListener('click', function() {
      var menuContent = document.getElementById('menuContent');
      var mainContent = document.getElementById('mainContent');
        if (menuContent.style.display === 'none') {
          menuContent.style.display = 'block';
          mainContent.style.display = 'none';
            this.textContent = '×'; // ボタンのテキストを変更
        } else {
          menuContent.style.display = 'none';
          mainContent.style.display = 'block';
          this.textContent = '□ Rese'; // ボタンのテキストを元に戻す
      }
    });
  </script>
  @endif
</body>

</html>