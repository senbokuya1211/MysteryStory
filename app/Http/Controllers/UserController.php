<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stage;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller{
  public function index(Request $rq){
    $keyword = $rq->input('keyword');
    if(empty($keyword)){
      $contents = Stage::withCount('reviews')
      ->orderBy('updated_at','desc')
      ->simplePaginate(8);
    }else{
      $contents = Stage::withCount('reviews')
      ->where('name','like','%'.$keyword.'%')
      ->orderBy('updated_at','desc')
      ->simplePaginate(8);
    }
    return view('index',compact('contents'));
  }
  public function mypage(){
    $id = auth()->id();
    if(auth()->user()->role == 1){
      $contents = DB::table('stages')
      ->where('user_id',$id)
      ->orderBy('updated_at','desc')
      ->simplePaginate(8);
      $countContents = DB::table('stages')
      ->where('user_id',$id)
      ->count('id');
      $countReviews =
        DB::table('reviews')
        ->join('stages','reviews.stage_id','=','stages.id')
        ->where('stages.user_id','=',$id)
        ->count('reviews.id');
      return view('mypage',compact('contents','countContents','countReviews'));
    }else{
      $contents = Review::select('reviews.id as reviewId','stages.id as stageId','stages.image','stages.name','stages.place','reviews.title','reviews.body','reviews.updated_at')
      ->withCount('likes')
      ->join('stages','reviews.stage_id','=','stages.id')
      ->where('reviews.user_id',$id)
      ->orderBy('reviews.updated_at','desc')
      ->simplePaginate(8);
      $countReviews = DB::table('reviews')
      ->where('user_id',$id)
      ->count('id');
      $countLikes = DB::table('likes')
      ->join('reviews','likes.review_id','=','reviews.id')
      ->where('reviews.user_id',$id)
      ->count();
      return view('mypage',compact('contents','countReviews','countLikes'));
    }
  }
  public function form(){
    return view('form');
  }
  public function login(){
    return view('login');
  }
  public function logout(){
    return view('logout');
  }
  public function stage($id){
    $myId = auth()->id();
    $content = Stage::withCount('reviews')
    ->where('id',$id)
    ->first();
    $stageLike = Review::join('likes','reviews.id','likes.review_id')->where('stage_id',$id)->count();
    $items = Review::select('users.name','reviews.id as reviewId','reviews.updated_at as reviewTime','reviews.title','reviews.body')
    ->withCount('likes')
    ->join('users','reviews.user_id','=','users.id')
    ->where('stage_id',$id)
    ->where('user_id','<>',$myId)
    ->orderBy('reviewTime','desc')
    ->get();
    $myReview = Review::withCount('likes')
    ->where('stage_id',$id)
    ->where('user_id',$myId)
    ->first();
    return view('stage',compact('content','items','myReview','stageLike'));
  }
  public function resetpasscomp(){
    return view('resetpasscomp');
  }
}
