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
   <a href="{{ route('list.index') }}">日付一覧</a>
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

            <form action="{{ route('work.punchin') }}" method="POST">
                @csrf
                <button type="submit" class="btn">出勤</button>
            </form>
        </li>
        <li>
            <form action="{{ route('work.punchout') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn">退勤</button>
            </form>
        </li>
     </ul>
    <ul>
        <li>
            <form action="{{ route('breaking.start_time') }}" method="POST">
                @csrf
                <button type="submit" class="btn">休憩開始</button>
            </form>
        </li>
        <li>
            <form action="{{ route('breaking.end_time') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn">休憩終了</button>
            </form>
        </li>
     </ul>
     
</main>
</body>
<footer>
<small>Atte,ict.</small>
</footer>
</html>