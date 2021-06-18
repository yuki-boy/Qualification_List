@extends('layouts.auth')
@section('content')

<div class="form-wrapper">
  <h1>新規登録</h1>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-item">
      <label for="name"></label>
      <input class="form-control @error('name') is-invalid @enderror" type="name" name="name" required="required" placeholder="お名前"></input>
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

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

    <div class="form-item">
      <label for="password-confirm"></label>
      <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="パスワード確認"></input>
    </div>

    <div class="button-panel">
      <input  type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="{{ route('login') }}">アカウントをお持ちの方はこちら</a></p>
    <!-- <p><a href="#">Forgot password?</a></p> -->
  </div>
</div>

@endsection
