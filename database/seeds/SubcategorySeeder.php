<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SubCategory::create([
        'title' => 'Surfboards',
        'slug' => 'surfboards',
        'base_category_id' => 1
      ]);
      SubCategory::create([
        'title' => 'Covers',
        'slug' => 'covers',
        'base_category_id' => 1
      ]);
      SubCategory::create([
        'title' => 'Sails',
        'slug' => 'sails',
        'base_category_id' => 1
      ]);



      SubCategory::create([
        'title' => 'T-shirts',
        'slug' => 't-shirts',
        'base_category_id' => 2
      ]);
      SubCategory::create([
        'title' => 'Shorts',
        'slug' => 'shorts',
        'base_category_id' => 2
      ]);
      SubCategory::create([
        'title' => 'Hoodies',
        'slug' => 'hoodies',
        'base_category_id' => 2
      ]);



      SubCategory::create([
        'title' => 'Snapbacks',
        'slug' => 'snapbacks',
        'base_category_id' => 3
      ]);
      SubCategory::create([
        'title' => 'Fullcaps',
        'slug' => 'fullcaps',
        'base_category_id' => 3
      ]);
      SubCategory::create([
        'title' => 'Hats',
        'slug' => 'hats',
        'base_category_id' => 3
      ]);



      SubCategory::create([
        'title' => 'Sunbrilles',
        'slug' => 'sunbrilles',
        'base_category_id' => 4
      ]);
      SubCategory::create([
        'title' => 'Gloves',
        'slug' => 'gloves',
        'base_category_id' => 4
      ]);
      SubCategory::create([
        'title' => 'Stripes',
        'slug' => 'stripes',
        'base_category_id' => 4
      ]);
    }
}
