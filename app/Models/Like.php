<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
      'user_id',
      'review_id',
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function review()
    {
      return $this->belongsTo(Review::class);
    }
}
