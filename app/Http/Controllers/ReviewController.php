<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Pagination\Paginator;

class ReviewController extends Controller
{
    public function reviewUp(Request $request){
      Review::create([
        'title' => $request['title'],
        'body' => $request['body'],
        'user_id' => $request['user_id'],
        'stage_id' => $request['stage_id'],
      ]);
      $id = $request['stage_id'];
      return view('complete',compact('id'));
    }

    public function delete($id){
      Review::find($id)
      ->destroy($id);
      return back();
    }

    public function edit($id){
      $content = Review::find($id)
      ->where('id',$id)
      ->first();
      return view('edit',compact('content'));
    }

    public function reviewEditComp(Request $request){
      Review::find($request['id'])
      ->fill([
        'title' => $request['title'],
        'body' => $request['body'],
      ])->save();
      $id = $request['stage_id'];
      return view('complete',compact('id'));
    }
}
