@extends('pagelayout')
@section('content')

<section class="form">
  <div class="">
    <h2>お問い合わせ</h2>
    <form action="{{route('complete')}}" method="post">
      @csrf
      <p>下記の内容をご確認の上送信ボタンを押してください</p>
      <p>内容を訂正する場合は戻るを押してください。</p>
      <dl class="confirm">
        <dt>なまえ</dt>
        <dd>セッションネーム</dd>
        <dt>タイトル</dt>
        <dd>{{$inputs['title']}}</dd>
        <dt>感想</dt>
        <dd>{!! nl2br(e($inputs['body'])) !!}</dd>
        <dd class="confirm_btn">
          <input type="hidden" name="name" value="{{$inputs['name']}}">
          <input type="hidden" name="kana" value="{{$inputs['title']}}">
          <input type="hidden" name="body" value="{{$inputs['body']}}">
          <input type="hidden" name="created_at" value="{{\Carbon\Carbon::now()}}">
          <button class="send" type="submit" name="action" value="submit">送&emsp;信</button>
          <button class="return" type="submit" name="action" value="back">戻&emsp;る</button>
        </dd>
      </dl>
    </form>
  </div>
</section>
@endsection
