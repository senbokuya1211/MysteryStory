@extends('pagelayout')
@section('content')
<section class="wrap">
 <div class="content">
   <div class="form_background">
     <h2 class="edit_comp">投稿しました！</h2>
     <div class="comp_button">
       <div class="form_button">
         <a href="{{route('stage',$id)}}">公演詳細へ</a>
       </div>
       <!-- <div class="form_button"> -->
         <!-- <a href="{{route('mypage')}}">マイページへ戻る</a> -->
       <!-- </div> -->
       <div class="form_button">
         <a href="{{route('index')}}">トップへ戻る</a>
       </div>
     </div>
   </div>
 </div>
</section>
@endsection
