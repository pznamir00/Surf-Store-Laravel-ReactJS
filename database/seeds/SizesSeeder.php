<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'sub_category_id' => 1,
            'value' => "6'0",
        ]);
        Size::create([
            'sub_category_id' => 1,
            'value' => "6'1",
        ]);
        Size::create([
            'sub_category_id' => 4,
            'value' => "L",
        ]);
        Size::create([
            'sub_category_id' => 4,
            'value' => "XL",
        ]);
        Size::create([
            'sub_category_id' => 7,
            'value' => "58",
        ]);
        Size::create([
            'sub_category_id' => 8,
            'value' => "60",
        ]);
    }
}
