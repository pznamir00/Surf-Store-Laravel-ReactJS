<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;
use App\Traits\slugAutoCreator;

class Category extends Model
{
    use slugAutoCreator;

    protected $fillable = [
      'title'
    ];

    public function subcategories(){
      return $this->hasMany(SubCategory::class, 'base_category_id', 'id');
    }

    public static function boot(){
      parent::boot();
      static::creating(function($category) {
        $category->create_slug();
      });
    }
}
