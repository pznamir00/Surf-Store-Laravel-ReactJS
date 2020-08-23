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
          'name' => 'Black',
          'hex_code' => '#000000'
        ]);
        Color::create([
          'name' => 'White',
          'hex_code' => '#ffffff'
        ]);
        Color::create([
          'name' => 'Red',
          'hex_code' => '#ff0000'
        ]);
        Color::create([
          'name' => 'Blue',
          'hex_code' => '#005eff'
        ]);
        Color::create([
          'name' => 'Green',
          'hex_code' => '#25ba00'
        ]);
        Color::create([
          'name' => 'Yellow',
          'hex_code' => '#fff200'
        ]);
        Color::create([
          'name' => 'Gray',
          'hex_code' => '#757575'
        ]);
        Color::create([
          'name' => 'Brown',
          'hex_code' => '#691b05'
        ]);
    }
}
