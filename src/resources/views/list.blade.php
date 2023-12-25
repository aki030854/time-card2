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
   <a href="#">ホーム</a>
   <a href="">日付一覧</a>
   <form method="POST" action="{{ route('logout') }}">
   @csrf
      <button type="submit">ログアウト</button>
    </form>
   </nav>
 <body>
     <main>
         <h1>日別一覧</h1>
         <form class="form">
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr>
              <th>名前</th><th>勤務開始</th><th>勤務終了</th><th>休憩時間</th><th>勤務時間</th>
            </tr>
            <tr>
              <td class="list-table__text">
               
              @foreach($users as $user)
                 <article>
                     <p>{{ $user->name }}</p>
                 </article>
                @endforeach;
                
              </td>
              <td class="list-table__text">
                @foreach($works as $work)
                 <article>
                     <p>{{ $work->punchin }}</p>
                 </article>
                @endforeach
              </td>
              <td class="list-table__text">
                @foreach($works as $work)
                 <article>
                     <p>{{ $work->puchout }}</p>
                 </article>
                @endforeach
              </td>
              <td>(休憩時間total)</td>
              <td>(勤務時間total) $work_time_sec = strtotime($punchout)-strtotime($punchin);              //退勤時間から開始時間を引いて、勤務時間(秒)を求める</td>
            </tr>
          </table>
        </div>
      </form>
 
     </main>
 
     <footer>
         
     </footer>
 </body>
 
 </html>
2
3
4
5
6
7
8
@foreach($users as $user)
  <table>
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    </tr>
  </table>
@endforeach