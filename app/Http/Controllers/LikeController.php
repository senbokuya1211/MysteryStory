<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Http\Request;

use Auth;

class LikeController extends Controller
{
  public function like(Request $request)
  {
    $user_id = Auth::user()->id;
    $review_id = $request->review_id;
    $already_liked = Like::where('user_id', $user_id)->where('review_id', $review_id)->first();
    if (!$already_liked) {
      $like = new Like;
      $like->review_id = $review_id;
      $like->user_id = $user_id;
      $like->save();
    } else {
      Like::where('review_id', $review_id)->where('user_id', $user_id)->delete();
    }
    $review_likes_count = Review::withCount('likes')->find($review_id)->likes_count;
    $param = [
        'review_likes_count' => $review_likes_count,
    ];
    return response()->json($param);
  }

}
