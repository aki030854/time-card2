<!DOCTYPE html>
 <html lang="ja">
 
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>会員登録</title>
     <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
 </head>
<body>
<header>
<h1>Atte</h1>
</header>
<main>
 
 @if ($errors->any())
  <div>
     <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
         @endforeach
     </ul>
    </div>
@endif
<div class="container">
      <h2>会員登録</h2>
      <form action="{{ route('register') }}" method="post">
        @csrf
        <dl class="form-list">
        <dd> <input type="text" name="name" placeholder="名前" value="{{ old('name') }}"></dd>
        <dd> <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}"></dd>
        <dd><input type="password" name="password" placeholder="パスワード"></dd>
        <dd><input type="password" name="password_confirmation" placeholder="パスワード確認"></dd>
        <button type="submit">登録</button>
      </form>
</div>
<p>ログインは<a href="login">こちら</a></p>
</main>
</body>
</body>
<footer>
<small>Atte,ict.</small>
</footer>
</html>
</html>