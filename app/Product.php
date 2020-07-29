<?php

namespace App;
use App\Size;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'title',
      'description',
      'price',
      'category_id'
    ];

    public function sizes(){
      return $this->hasMany('App\Size');
    }

    public function images(){
      return $this->hasMany('App\Image');
    }

    public function category(){
      return $this->belongsTo('App\SubCategory');
    }

    public function create_sizes($values, $quantities){
      foreach($values as $key=>$val){
        $size = Size::create([
          'value' => $val,
          'quantity' => $quantities[$key],
          'product_id' => $this->id
        ]);
      }
    }

    public function delete_sizes(){
      foreach($this->sizes as $size){
        $size->delete();
      }
    }

    public static function boot(){
      parent::boot();
      static::deleting(function($product){
        $product->delete_sizes();
        foreach($product->images as $img)
          $img->delete();
      });
    }
}
