<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
class StageController extends Controller
{
    public function stageUp(Request $request){
      $img = $request->file('image');
      $path = $img->store('img','public');
      Stage::create([
        'name' => $request['name'],
        'image' => $path,
        'description' => $request['description'],
        'start' => $request['start'],
        'end' => $request['end'],
        'place' => $request['place'],
        'url' => $request['url'],
        'user_id' => $request['user_id'],
      ]);
      return redirect()->route('mypage');
    }

    public function stageEdit($id){
      $content = Stage::find($id)
      ->where('id',$id)
      ->first();
      return view('stageEdit',compact('content'));
    }

    public function stageEditComp(Request $request){
      $img = $request->file('image');
      $path = $img->store('img','public');
      Stage::find($request['stage_id'])
      ->fill([
        'name' => $request['name'],
        'image' => $path,
        'description' => $request['description'],
        'start' => $request['start'],
        'end' => $request['end'],
        'place' => $request['place'],
        'url' => $request['url'],
        'user_id' =>$request['user_id']
      ])->save();
      $id = $request['stage_id'];
      return view('complete',compact('id'));
    }

    public function stageForm(){
      return view('stageForm');
    }
}
