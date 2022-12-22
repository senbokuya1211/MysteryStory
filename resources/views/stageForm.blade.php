@extends('pagelayout')
@section('content')
<section class="wrap">
  <div class="content">
    <div class="form_background">
      <div class="form_content">
        <h1 class="stage_up_title">新規公演登録</h1>
      </div>
      <form action="{{ route('stageUp') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form_content">
          <label for="name">タイトル</label>
          <div>
            <input class="stage_up_form" id="name" type="text" name="name" value="{{old('name')}}" required>
          </div>
        </div>
        <div class="form_content stage_up_date">
          <div class="date_content">
            <label for="start">開始日</label>
            <div>
              <input class="stage_up_form" id="start" type="date" name="start" required>
            </div>
          </div>
          <div class="date_content">
            <label for="end">終了日</label>
            <div>
              <input class="stage_up_form" id="end" type="date" name="end">
            </div>
          </div>
        </div>
        <div class="form_content">
          <label for="place">場所</label>
          <div>
            <input class="stage_up_form" id="place" type="text" name="place" required>
          </div>
        </div>
        <div class="form_content">
          <label for="description">概要</label>
          <div>
            <textarea class="stage_up_form" id="description" name="description" rows="15" placeholder="" required>{{old('description')}}</textarea>
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
            <input class="stage_up_form" id="url" type="url" name="url" required>
          </div>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
          <input class="form_button" type="submit" value="アップロード">
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
