<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    protected $fillable = [
      'title',
    ];

    public static function create_slug($title)
    {
      $slug = preg_replace('~[^\pL\d]+~u', '-', $title);
      $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
      $slug = preg_replace('~[^-\w]+~', '', $slug);
      $slug = trim($slug, '-');
      $slug = preg_replace('~-+~', '-', $slug);
      $slug = strtolower($slug);
      return empty($slug) ? 'slug' : $slug;
    }

    public function subcategories()
    {
      return $this->hasMany(SubCategory::class, 'base_category_id', 'id');
    }
}
