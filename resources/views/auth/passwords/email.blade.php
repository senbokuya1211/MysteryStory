@extends('pagelayout')
@section('content')
<div class="wrap">
  <div class="content">
    <div class="form_background">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form_content">
          <label for="email">メールアドレス</label>
          <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div>
          <div>
            <button class="form_button" type="submit">
              パスワードリセットメールを送信
            </button>
          </div>
          <div class="form_link">
            <a class="focus" href="{{route('login')}}">ログインページに戻る</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
