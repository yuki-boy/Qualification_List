@extends('layouts.auth')

@section('content')
<div class="form-wrapper">
    <h1>パスワードを<br>リセット</h1>
    <form method="POST" action="{{ route('password.email') }}">
    @csrf

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="form-item">
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="メールアドレス"></input>
    </div>

    <div class="button-panel">
        <div class="col-md-6">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

        <div class="button-panel" style="padding-bottom: 24px;">
        <input type="submit" class="button" title="Sign In" value="リセットリンクを送信">
        </input>
        </div>
    </form>
</div>
@endsection
