@extends('pagelayout')
@section('content')
<div class="wrap">
  <div class="content">
    <div class="form_background">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form_content">
          <label for="email">メールアドレス</label>
          <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          </div>
        </div>
        <div class="form_content">
          <label for="password">パスワード</label>
          <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          </div>
        </div>
        <div class="form_content">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <p class="error_m">{{ $message }}</p>
          </span>
          @enderror
          @error('password')
          <span class="invalid-feedback" role="alert">
            <p class="error_m">{{ $message }}</p>
          </span>
          @enderror
        </div>
        <div>
          <button class="form_button" type="submit">ログイン</button>
          @if (Route::has('password.request'))
          <div class="form_link">
            <a href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
          </div>
          @endif
          @if (Route::has('register'))
          <div class="form_link">
            <a class="focus" href="{{ route('register') }}">新規登録する</a>
          </div>
          @endif
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
