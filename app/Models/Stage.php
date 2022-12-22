<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $table = 'stages';
    protected $fillable = [
      'name',
      'image',
      'description',
      'start',
      'end',
      'place',
      'url',
      'user_id',
    ];

    public function reviews()
    {
      return $this->hasMany('App\Models\Review');
    }
}
