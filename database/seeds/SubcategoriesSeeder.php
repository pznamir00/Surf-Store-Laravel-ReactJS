<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sc = new SubCategory;
      $sc->title = 'T-shirts';
      $sc->slug = 't-shirts';
      $sc->base_category_id = 1;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Hoodies';
      $sc->slug = 'hoodies';
      $sc->base_category_id = 1;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Pants';
      $sc->slug = 'pants';
      $sc->base_category_id = 1;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Jackets';
      $sc->slug = 'jackets';
      $sc->base_category_id = 1;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Trainers';
      $sc->slug = 'trainers';
      $sc->base_category_id = 2;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Winter boots';
      $sc->slug = 'winter-boots';
      $sc->base_category_id = 2;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Fullcaps';
      $sc->slug = 'fullcaps';
      $sc->base_category_id = 3;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Snapbacks';
      $sc->slug = 'snapbacks';
      $sc->base_category_id = 3;
      $sc->save();

      $sc = new SubCategory;
      $sc->title = 'Winter caps';
      $sc->slug = 'winter-caps';
      $sc->base_category_id = 3;
      $sc->save();
    }
}
