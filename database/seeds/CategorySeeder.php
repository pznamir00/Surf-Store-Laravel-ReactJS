<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'title' => 'Equipment',
          'slug' => 'equipment'
        ]);

        Category::create([
          'title' => 'Clothes',
          'slug' => 'clothes'
        ]);

        Category::create([
          'title' => 'Caps',
          'slug' => 'caps'
        ]);

        Category::create([
          'title' => 'Accessories',
          'slug' => 'accessories'
        ]);
    }
}
