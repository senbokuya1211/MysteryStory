<header class="header">
  <div class="logo"><a href="{{route('index')}}"><img src="{{asset('img/mystery_logo.jpg')}}"></a></div>
  <nav class="navi">
    <ul>
      <!-- <li><a href="{{route('logout')}}">ログアウト</a></li> -->
      @auth
      <li class="header_button header_auth"><a href="{{route('mypage')}}">マイページ</a></li>
      @endauth
      @guest
      <li class="header_button header_guest"><a href="{{route('login')}}">ログイン/新規登録</a></li>
      @endguest
    </ul>
  </nav>
</header>
