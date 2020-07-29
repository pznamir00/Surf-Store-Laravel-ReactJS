<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    protected $fillable = [
      'product_id',
      'order_id',
      'size_id',
      'quantity'
    ];
}
