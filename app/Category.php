<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    protected $fillable = [
      'title',
      'slug'
    ];

    public function subcategories()
    {
      return $this->hasMany(SubCategory::class, 'base_category_id', 'id');
    }
}
