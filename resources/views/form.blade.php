@extends('pagelayout')
@section('content')

<section class="form">
  <div class="contact_box">
    <h2>感想投稿</h2>
    <form name="submitForm" action="{{route('complete')}}" method="post">
      @csrf
      <h3 class="">下記の項目をご記入の上送信ボタンを押してください</h3>
      <h3 class="">ユーザーネームは投稿後、自動で表示されます</h3>
      <dl>
        <dt>
          <h3>タイトル</h3>
          @if($errors->has('title'))
          <h3><span class="error_m">{{$errors->first('title')}}</span></h3>
          @endif
        </dt>
        <dd>
          <input type="text" name="title" value="{{old('title')}}">
        </dd>
      </dl>
      <h3 class="gradient">感想をご記入ください</h3>
      @if($errors->has('body'))
      <h3><span class="error_m">{{$errors->first('body')}}</span></h3>
      @endif
      <dl>
        <dd>
          <textarea name="body" rows="5" placeholder="">{{old('body')}}</textarea>
        </dd>
        <dd>
          <input id="validate" class="send" type="submit" name="submit" value="送&emsp;信">
        </dd>
      </dl>
    </form>
  </div>
</section>

@endsection
