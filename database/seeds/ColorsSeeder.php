<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
        [
          'name' => 'Black',
          'hex_code' => '#000000'
        ],
        [
          'name' => 'White',
          'hex_code' => '#ffffff'
        ],
        [
          'name' => 'Red',
          'hex_code' => '#ff0000'
        ],
        [
          'name' => 'Blue',
          'hex_code' => '#005eff'
        ],
        [
          'name' => 'Green',
          'hex_code' => '#25ba00'
        ],
        [
          'name' => 'Yellow',
          'hex_code' => '#fff200'
        ],
        [
          'name' => 'Gray',
          'hex_code' => '#757575'
        ],
        [
          'name' => 'Brown',
          'hex_code' => '#691b05'
        ]
      ]);
    }
}
