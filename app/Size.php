<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
      'value',
      'product_id',
      'category_id',
    ];
}
