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
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
 </form>
   <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    ログアウト</a>
   </nav>
</header>


 <h3>{{ Auth::user()->name }}さんお疲れ様です！</h3>

   <div class="button-container">
    <form action="{{ route('work.punchin') }}" method="POST">
        @csrf
        <button id="btn1" class="button" type="button" onclick="handleButtonClick(1)">出勤</button>
    </form>

    <form action="{{ route('work.punchout') }}" method="POST">
        @csrf
        @method('PATCH')
        <button id="btn2" class="button" type="button" disabled>退勤</button>
    </form>

    <form action="{{ route('breaking.start_time') }}" method="POST">
        @csrf
        <button id="btn3" class="button" type="button" disabled onclick="handleButtonClick(3)">休憩開始</button>
    </form>

    <form action="{{ route('breaking.end_time') }}" method="POST">
        @csrf
        @method('PATCH')
        <button id="btn4" class="button" type="button" disabled onclick="handleButtonClick(4)">休憩終了</button>
    </form>
</div>

<script>
    let activeButton = 1;

    function handleButtonClick(clickedButton) {
        // クリックされたボタン以外を無効化
        document.getElementById('btn1').disabled = (clickedButton !== 1);
        document.getElementById('btn2').disabled = (clickedButton !== 2);
        document.getElementById('btn3').disabled = (clickedButton !== 3);
        document.getElementById('btn4').disabled = (clickedButton !== 4);

        if (clickedButton === 1) {
            // 出勤ボタンを押したら退勤ボタンと休憩開始ボタンのみ有効
            document.getElementById('btn2').disabled = false;
            document.getElementById('btn3').disabled = false;
        
        } else if (clickedButton === 3) {
            // 休憩開始ボタンを押したら休憩終了ボタンのみ有効
            document.getElementById('btn4').disabled = false;
        } else if (clickedButton === 4) {
            // 休憩終了ボタンを押したら退勤ボタンと休憩開始ボタンのみ有効
            document.getElementById('btn2').disabled = false;
            document.getElementById('btn3').disabled = false;
        }
    }

    // 退勤ボタンを押したらすべてのボタンを無効にする
    function handlePunchout() {
        document.querySelectorAll('.button').forEach(btn => {
            btn.disabled = true;
        });
    }
</script>
</body>
</html>