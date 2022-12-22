@extends('pagelayout')
@section('content')
<section class="wrap">
  <div class="content">
    <div class="form_background">
      <form name="stageEditComp" action="{{route('stageEditComp')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form_content">
          <label for="name">タイトル</label>
          <div>
            <input id="name" class="stage_up_form" type="text" name="name" value="{{ old('name',$content->name) }}" required>
          </div>
        </div>
        <div class="form_content stage_up_date">
          <div class="date_content">
            <label for="start">開始日</label>
            <div>
              <input class="stage_up_form" id="start" type="date" name="start" value="{{ old('start',$content->start) }}" required>
            </div>
          </div>
          <div class="date_content">
            <label for="end">終了日</label>
            <div>
              <input class="stage_up_form" id="end" type="date" name="end" value="{{ old('end',$content->end) }}">
            </div>
          </div>
        </div>
        <div class="form_content">
          <label for="place">場所</label>
          <div>
            <input class="stage_up_form" id="place" type="text" name="place" value="{{ old('place',$content->place) }}" required>
          </div>
        </div>
        <div class="form_content">
          <label for="description">概要</label>
          <div>
            <textarea class="stage_up_form" id="description" name="description" rows="15" placeholder="" required>{{old('description',$content->description)}}</textarea>
          </div>
        </div>
        <div class="form_content">
          <label for="image">画像</label>
          <div>
            <input id="image" type="file" name="image" required>
          </div>
        </div>
        <div class="form_content">
          <label for="url">URL</label>
          <div>
            <input class="stage_up_form" id="url" type="url" name="url" value="{{ old('url',$content->url) }}" required>
          </div>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="stage_id" value="{{ $content->id }}">
        <div class="form_content">
          <input id="validate" class="send form_button" type="submit" name="submit" value="編集完了">
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
