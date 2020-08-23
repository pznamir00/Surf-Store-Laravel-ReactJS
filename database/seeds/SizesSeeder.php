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
        Size::create(
          [
            'sub_category_id' => 1,
            'value' => "6'0",
          ],
          [
            'sub_category_id' => 1,
            'value' => "6'1",
          ],
          [
            'sub_category_id' => 4,
            'value' => "L",
          ],
          [
            'sub_category_id' => 4,
            'value' => "XL",
          ],
          [
            'sub_category_id' => 7,
            'value' => "58",
          ],
          [
            'sub_category_id' => 8,
            'value' => "60",
          ]
        );
    }
}
