@extends('pagelayout')
@section('content')
<section class="main_visual">
  <img src="{{asset('img/main.jpg')}}">
  <h1 class="main_text"><span class="mystery">謎</span>を解いて、<span class="mystery">謎</span>に出会おう</h1>
</section>
<div class="wrap">
  <section class="content">
    <div class="title">
      <h1>イベント一覧</h1>
    </div>
    <div class="event_list">
      @foreach($contents as $content)
      <article>
        <a href="{{route('stage',$content->id)}}">
          <div class="event_img">
            <img src="{{Storage::url($content->image)}}">
          </div>
          <div>
            <h3 class="event_title">{{ $content->name }}</h3>
          </div>
          <ul class="event_content">
            <li>
              <i class="fa-solid fa-location-dot location"></i>
              <span>{{ $content->place }}</spam>
            </li>
            <li>
              <i class="fa-solid fa-calendar-days calender"></i>
              <span>{{ $content->start }}</span>
              <span>~</span>
              @if($content->end == null)
              <span>終了未定</span>
              @else
              <span>{{ $content->end }}</span>
              @endif
            </li>
            <li>みんなの感想数：{{ $content->reviews_count }}</li>
          </ul>
        </a>
      </article>
      @endforeach
    </div>
    <div class="page">{{ $contents->links() }}</div>
  </section>
</div>

@endsection
