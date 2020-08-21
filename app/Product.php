<?php

namespace App;
use App\Size;
use App\SizeRelationship;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'title',
      'description',
      'price',
      'sub_category_id',
      'color_id',
      'producent_id'
    ];

    public function sizes(){
      return $this->hasMany('App\SizeRelationship');
    }

    public function images(){
      return $this->hasMany('App\Image');
    }

    public function sub_category(){
      return $this->belongsTo('App\SubCategory');
    }

    public function color(){
      return $this->belongsTo('App\Color');
    }

    public function producent(){
      return $this->belongsTo('App\Producent');
    }

    public function create_sizes($quantities){
      foreach($quantities as $key => $val){
        if($val != 0 && $val != ''){
          SizeRelationship::create([
            'product_id' => $this->id,
            'size_id' => ($key + 1),
            'quantity' => $val
          ]);
        }
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
