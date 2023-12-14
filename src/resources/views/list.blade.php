<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>日別一覧</title>
 </head>
 
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
                @foreach($users as $user)
                 <article>
                     <p>{{ $user->name }}</p>
                 </article>
                @endforeach
              </td>
              <td>(勤務終了時間)</td>
              <td>(休憩時間total)</td>
              <td>(勤務時間total)</td>
            </tr>
          </table>
        </div>
      </form>
 
         
             @foreach($users as $user)
                 <article>
                     <p>{{ $user->name }}</p>
                 </article>
             @endforeach
         
     </main>
 
     <footer>
         
     </footer>
 </body>
 
 </html>