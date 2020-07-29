<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
      'title',
      'slug',
      'base_category_id',
    ];

    public function base_category(){
      return $this->belongsTo('App\Category');
    }
}
