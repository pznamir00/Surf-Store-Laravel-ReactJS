<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeRelationship extends Model
{
    protected $fillable = [
      'product_id',
      'size_id',
      'quantity'
    ];

    public function size(){
      return $this->belongsTo('App\Size');
    }
}
