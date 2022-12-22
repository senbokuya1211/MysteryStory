@extends('pagelayout')
@section('content')
<div class="wrap">
  <div class="content">
    <div class="form_background">
      <form method="POST" action="{{ route('password.update') }}">
      @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
          <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
          <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div>
          <label for="password">パスワード</label>
          <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div>
          <label for="password-confirm">パスワード再入力</label>
          <div>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>
        <div>
          <div>
            <button class="form_button" type="submit">パスワードリセット</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
