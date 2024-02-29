<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css1')
</head>

<body>
  <button id="toggleMenuButton">□ Rese</button>
  <header class="header">
    <div id="menuContent" style="display: none;">
      <nav class="header__nav">
        <ul class="header__nav-box">
          <li><a href="/">Home</a></li>
          <li><a href="/register">Register</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div id="mainContent" style="display: block;">
    @yield('content1')
    </div>
  </main>
  <script>
    document.getElementById('toggleMenuButton').addEventListener('click', function() {
      var menuContent = document.getElementById('menuContent');
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
</body>

</html>