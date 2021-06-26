@extends('layouts.auth')
@section('title', '資格管理 login')
@section('content')

<div class="form-wrapper">
  <h1>ログイン</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-item">
      <label for="email"></label>
      <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required="required" placeholder="メールアドレス"></input>
      @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="form-item">
      <label for="password"></label>
      <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="required" placeholder="パスワード"></input>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>

  <div class="form-footer">
    <p><a href="{{ route('register') }}">初めての方はこちら</a></p>
    <p><a href="{{ route('password.request') }}">パスワードをお忘れですか？</a></p>
  </div>
</div>

@endsection
