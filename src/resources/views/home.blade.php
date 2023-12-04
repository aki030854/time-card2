<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>menber</title>
   <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
</head>
<body>
<header>
<h1>Atte</h1>
 <nav>
   <a href="#">ホーム</a>
   <a href="">日付一覧</a>
   <form method="POST" action="{{ route('logout') }}">
   @csrf
      <button type="submit">ログアウト</button>
    </form>
   </nav>
</header>
<main>

 <h3>{{ Auth::user()->name }}さんお疲れ様です！</h3>
   <div class="timepunch-button-form">
    <ul>
        <li>
            <form action="{{ route('timestamp.punchin') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">出勤</button>
            </form>
        </li>
        <li>
            <form action="{{ route('timestamp.punchout') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">退勤</button>
            </form>
        </li>
     </ul>
    <ul>
        <li>
            <form action="{{ route('casser.breakstart') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-start">休憩開始</button>
            </form>
        </li>
        <li>
            <form action="{{ route('casser.breakend') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-end">休憩終了</button>
            </form>
        </li>
     </ul>
     
</main>
</body>
<footer>
<small>Atte,ict.</small>
</footer>
</html>