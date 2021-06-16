@extends('layouts.auth')
@section('content')

<div class="form-wrapper">
  <h1>ログイン</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-item">
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="メールアドレス"></input>
    </div>

    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="パスワード"></input>
    </div>

    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="{{ route('register') }}">初めての方はこちら</a></p>
    <p><a href="#">パスワードをお忘れですか？</a></p>
  </div>
</div>

@endsection
