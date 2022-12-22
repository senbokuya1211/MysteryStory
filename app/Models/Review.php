<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
      'title',
      'body',
      'user_id',
      'stage_id',
    ];

    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
    public function stage()
    {
      return $this->belongsTo('App\Models\Stage');
    }
    public function isLikedBy($user): bool {
      return Like::where('user_id', $user->id)->where('review_id', $this->reviewId)->first() !=null;
    }
}
