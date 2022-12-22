@extends('pagelayout')
@section('content')
<div class="wrap">
  <section class='content'>
    <div class="stage_container">
      <div class="stage_img">
        <img src="{{Storage::url($content->image)}}">
      </div>
      <div class="stage_content">
          <h2>{{ $content->name }}</h2>
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
          <p class="stage_description">{!! nl2br(htmlspecialchars( $content->description )) !!}</p>
          <div class="link_button"><a href="{{ $content->url }}" target="_blank" rel="noopener noreferrer">公式ホームページへリンク</a></div>
          <div>みんなの感想数：{{ $content->reviews_count }}</div>
          <div>
            <i class="fa-solid fa-heart liked">
              <span class="like-counter">{{ $stageLike }}</span>
            </i>
        </div>
      </div>
    </div>
  </section>

  @guest
  <section class="content">
    <div class="catch_button"><a href="{{route('login')}}">ログイン・新規登録して感想をかこう！</a></div>
  </section>
  <section class="content">
    @foreach($items as $item)
    <div class="stage_review">
      <div class="review_name"><p>{{ $item->name }}<span>さんの感想</span></p></div>
      <div class="review_top"><p class="review_title">{{ $item->title }}</p></div>
      <div class="review_body">
        <p class="review_hide">本文は参加後に感想を投稿すると見られます！</p>
      </div>
      <div class="review_bottom">
        <p class="review_time">{{ $item->reviewTime }}</p>
        <i class="fa-solid fa-heart">
          <span>{{ $item->likes_count }}</span>
        </i>
      </div>
    </div>
    @endforeach
  </section>
  @endguest

  @auth
  @if(auth()->user()->role == 1)
  <!-- 管理者ユーザー -->
  <section class="content">
    @foreach($items as $item)
    <div class="stage_review">
      <div class="review_name"><p>{{ $item->name }}<span>さんの感想</span></p></div>
      <div class="review_top"><p class="review_title">{{ $item->title }}</p></div>
      <div class="review_body">
        <p>{!! nl2br(htmlspecialchars($item->body)) !!}<p>
      </div>
      <div class="review_bottom">
        <p class="review_time">{{ $item->reviewTime }}</p>
        <i class="fa-solid fa-heart liked">
          <span>{{ $item->likes_count }}</span>
        </i>
      </div>
    </div>
    @endforeach
  </section>
  @else
  <!-- 一般ユーザー -->
    @if($myReview == null)
    <!-- 感想がないとき -->
    <section class="content container">
      <div class="form_background">
        <form name="submitForm" action="{{route('reviewUp')}}" method="post">
          @csrf
          <div>
            <p class="catch">この謎を解いて、感想をかこう！</p>
          <div>
          <div class="form_content">
            <label for="title">タイトル</label>
            <div>
              @if($errors->has('title'))
              <span class="error_m">{{$errors->first('title')}}</span>
              @endif
              <input id="title" class="form_title" type="text" name="title" value="{{old('title')}}" required>
            </div>
          </div>
          <div class="form_content">
            <label for="body">感想</label>
            <div>
              @if($errors->has('body'))
              <span class="error_m">{{$errors->first('body')}}</span>
              @endif
              <textarea id="body" class="form_body" name="body" rows="10" placeholder="" required>{{old('body')}}</textarea>
            </div>
          </div>
          <div>
            <input id="validate" class="send form_button" type="submit" name="submit" value="投&emsp;稿">
          </div>
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="stage_id" value="{{ $content->id }}">
        </form>
      </div>
    </section>
    <section class="content">
      @foreach($items as $item)
      <div class="stage_review">
        <div class="review_name"><p>{{ $item->name }}<span>さんの感想</span></p></div>
        <div class="review_top"><p class="review_title">{{ $item->title }}</p></div>
        <div class="review_body">
          <p class="review_hide">本文は参加後に感想を投稿すると見られます！</p>
        </div>
        <div class="review_bottom">
          <p class="review_time">{{ $item->reviewTime }}</p>
          <i class="fa-solid fa-heart">
            <span>{{ $item->likes_count }}</span>
          </i>
        </div>
      </div>
      @endforeach
    </section>
    @else
    <!-- 感想があるとき -->
    <section class="content">
      <div class="stage_review">
        <div class="review_name"><p>{{ Auth::user()->name }}<span>さんの感想</span></p></div>
        <div class="review_top"><p class="review_title">{{ $myReview->title }}</p></div>
        <div class="review_body">
          <p>{!! nl2br(htmlspecialchars($myReview->body)) !!}<p>
        </div>
        <div class="review_bottom">
          <p class="review_time">{{ $myReview->updated_at }}</p>
          <i class="fa-solid fa-heart liked">
            <span>{{ $myReview->likes_count }}</span>
          </i>
        </div>
        <div class="review_bottom_button">
          <form name="editForm" action="{{route('edit',$myReview->id)}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$myReview->id}}">
            <button class="form_button" type="submit">編集</button>
          </form>
          <form name="deleteForm" action="{{route('delete',$myReview->id)}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$myReview->id}}">
            <button class="focus" type="button" onclick="confirm('本当に削除しますか？')?document.deleteForm.submit():false;">削除</button>
          </form>
        </div>
      </div>
    </section>

    <section class="content">
      @foreach($items as $item)
      <div class="stage_review">
        <div class="review_name"><p>{{ $item->name }}<span>さんの感想</span></p></div>
        <div class="review_top"><p class="review_title">{{ $item->title }}</p></div>
        <div class="review_body">
          <p>{!! nl2br(htmlspecialchars($item->body)) !!}<p>
        </div>
        <div class="review_bottom">
          <p class="review_time">{{ $item->reviewTime }}</p>
          <div>
            @if(!$item->isLikedBy(Auth::user()))
            <!-- いいねしてない -->
            <span class="likes">
              <i class="fa-solid fa-heart likeToggle" data-review-id="{{ $item->reviewId }}">
                <span class="like-counter">{{$item->likes_count}}</span>
              </i>
            </span>
            @else
            <!-- いいねしている -->
            <span class="likes">
              <i class="fa-solid fa-heart likeToggle liked" data-review-id="{{ $item->reviewId }}">
                <span class="like-counter">{{$item->likes_count}}</span>
              </i>
            </span>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </section>
    @endif
  @endif
  @endauth
</div>
@endsection
