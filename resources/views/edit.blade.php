@extends('pagelayout')
@section('content')
<section class="wrap">
  <div class="content">
    <div class="form_background">
      <form name="editForm" action="{{route('reviewEditComp')}}" method="post">
        @csrf
        <div class="form_content">
          <label for="title">タイトル</label>
          <div>
            @if($errors->has('title'))
            <span class="error_m">{{$errors->first('title')}}</span>
            @endif
            <input id="title" class="form_title" type="text" name="title" value="{{ old('title',$content->title) }}" required>
          </div>
        </div>
        <div class="form_content">
          <label for="body">感想</label>
          <div>
            @if($errors->has('body'))
            <span class="error_m">{{$errors->first('body')}}</span>
            @endif
            <textarea id="body" class="form_body" name="body" rows="15" placeholder="" required>{{ old('body',$content->body) }}</textarea>
          </div>
        </div>
        <div class="form_content">
          <input id="validate" class="send form_button" type="submit" name="submit" value="編集完了">
        </div>
        <input type="hidden" name="id" value="{{ $content->id }}">
        <input type="hidden" name="stage_id" value="{{ $content->stage_id }}">
      </form>
    </div>
  </div>
</section>
@endsection
