@extends('layouts.auth')
@section('content')

<div class="form-wrapper">
  <h1>新規登録</h1>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-item">
      <label for="name"></label>
      <input type="name" name="name" required="required" placeholder="Name"></input>
    </div>

    <div class="form-item">
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="Email Address"></input>
    </div>

    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="Password"></input>
    </div>

    <div class="form-item">
      <label for="password-confirm"></label>
      <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation"></input>
    </div>

    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="#">Create an account</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
</div>

@endsection
