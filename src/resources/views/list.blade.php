<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>日別一覧</title>
 </head>
 <header>
<h1>Atte</h1>
 <nav>
   <a href="home">ホーム</a>
   <a href="#">日付一覧</a>
   <a href="{{ route('logout') }}">ログアウト</a>
  </nav>
 <body>
     <main>
         <h1>{{ $targetDate->format('n月j日') }}</h1>

<table>
    <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
    </tr>
    @foreach($userWorkStatus as $status)
        <tr>
            <td>{{ $status->name }}</td>
            <td>{{ $status->punchin_time }}</td>
            <td>{{ $status->punchout_time }}</td>
            <td>{{ $status->total_break_time }}</td>
            <td>{{ $status->total_work_time }}</td>
        </tr>
    @endforeach
</table>

{{ $userWorkStatus->links() }}

<div>
    <a href="{{ route('list.index', ['date' => $targetDate->subDay()->format('Y-m-d')]) }}"><</a>
    <a href="{{ route('list.index', ['date' => $targetDate->addDay()->format('Y-m-d')]) }}">></a>
</div>
 
     </main>
 
     <footer>
         
     </footer>
 </body>
 
 </html>
