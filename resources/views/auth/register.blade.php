@extends('pagelayout')
@section('content')
<div class="wrap">
  <div class="content">
    <div class="form_background">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form_content">
          <label for="name">ニックネーム</label>
          <div>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          </div>
        </div>
        <div class="form_content">
          <label for="email">メールアドレス</label>
          <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          </div>
        </div>
        <div class="form_content">
          <label for="password">パスワード</label>
          <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          </div>
        </div>
        <div class="form_content">
          <label for="password-confirm">パスワード再入力</label>
          <div>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>
        <div class="form_content">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <p class="error_m">{{ $message }}</p>
          </span>
          @enderror
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
          <div>
            <button class="form_button" type="submit">新規登録</button>
          </div>
        </div>
        <div>
          @if (Route::has('login'))
          <div class="form_link">
            <a class="focus" href="{{ route('login') }}">ログインページへ</a>
          </div>
          @endif
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
