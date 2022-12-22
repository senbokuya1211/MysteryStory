@extends('pagelayout')
@section('content')
@auth

@if(auth()->user()->role == 1)
<!-- 管理者ユーザー -->
  <section class="user_card">
    <div class="user_content">
     <p>管理者名：{{ Auth::user()->name }}</p>
     <p>登録公演数：{{ $countContents }}</p>
     <p>ユーザー感想数：{{ $countReviews }}</p>
   </div>
   <div class="user_content">
     <a class="focus" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('ログアウトする') }}
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST">
         @csrf
     </form>
   </div>
  </section>

  <div class="wrap">
    <section class="content">
      <div class="catch_button button_mid"><a href="{{route('stageForm')}}">新しく公演を登録する</a></div>
    </section>
  @if(!$contents == null)
    <section class="content">
      <div class="title">
        <h1>登録公演一覧</h1>
      </div>
    </section>
      @foreach($contents as $content)
      <section class="content">
        <div class="stage_container">
          <div class="stage_img mypage_img">
            <a href="{{ route('stage',$content->id) }}">
              <img src="{{Storage::url($content->image)}}">
            </a>
          </div>
          <div class="mypage_content">
            <a href="{{ route('stage',$content->id) }}">
              <h2>{{ $content->name }}</h2>
            </a>
            <div class="stage_info">
              <i class="fa-solid fa-location-dot location"></i>
              <span>{{ $content->place }}</span><br>
              <i class="fa-solid fa-calendar-days calender"></i>
              <span>{{ $content->start }}</span>
              <span>~</span>
              @if($content->end == null)
              <span>終了未定</span>
              @else
              <span>{{ $content->end }}</span>
              @endif
            </div>
            <div class="stage_info">
              <p>{!! nl2br(htmlspecialchars( $content->description )) !!}</p>
            </div>
            <div class="review_bottom_button">
              <form name="stageEdit" action="{{route('stageEdit',$content->id)}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$content->id}}">
                <button class="form_button" type="submit">公演内容を編集する</button>
              </form>
            </div>
          </div>
        </div>
      </section>
      @endforeach
      <div class="page">{{ $contents->links() }}</div>
  @endif
  </div>
@else
<!-- 一般ユーザー -->
  <section class="user_card">
    <div class="user_content">
     <p>ユーザーネーム：{{ Auth::user()->name }}</p>
     <p>投稿感想数：{{ $countReviews }}</p>
     <p>もらったいいね数：{{ $countLikes }}</p>
    </div>
    <div class="user_content" >
     <a class="focus" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('ログアウトする') }}
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST">
         @csrf
     </form>
    </div>
  </section>

  <div class="wrap">
    @if($countReviews==0)
    <section class="content">
      <div>
        <p class="catch">謎を解いて感想をかこう！</p>
      </div>
      <div class="catch_button button_mid"><a href="{{route('index')}}">全公演情報一覧へ</a></div>
    </section>
    @else
    <section class="content">
      <div class="title">
        <h1>参加公演・感想一覧</h1>
      </div>
    </section>
    @foreach($contents as $content)
    <section class="content">
      <div class="stage_container">
        <div class="stage_img mypage_img">
          <a href="{{ route('stage',$content->stageId) }}">
            <img src="{{Storage::url($content->image)}}">
          </a>
        </div>
        <div class="mypage_content">
          <a href="{{ route('stage',$content->stageId) }}">
            <h2>{{ $content->name }}</h2>
          </a>
          <div class="mypage_review">
            <div class="review_top"><p class="review_title">{{ $content->title }}</p></div>
            <div class="review_body">
              <p>{!! nl2br(htmlspecialchars($content->body)) !!}</p>
            </div>
            <div class="review_bottom">
              <p class="review_time">{{ $content->updated_at }}</p>
              <i class="fa-solid fa-heart liked">
                <span class="like-counter">{{ $content->likes_count }}</span>
              </i>
            </div>
            <div class="review_bottom_button">
              <form name="editForm" action="{{route('edit',$content->reviewId)}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$content->reviewId}}">
                <button class="form_button" type="submit">編集</button>
                </form>
                <form name="deleteForm" action="{{route('delete',$content->reviewId)}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$content->reviewId}}">
                <button class="focus" type="button" onclick="confirm('本当に削除しますか？')?document.deleteForm.submit():false;">削除</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endforeach
    <div class="page">{{ $contents->links() }}</div>
    @endif
  </div>
@endif

@endauth
@endsection
