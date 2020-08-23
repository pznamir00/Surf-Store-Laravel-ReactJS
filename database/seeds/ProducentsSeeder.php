<?php

use Illuminate\Database\Seeder;
use App\Producent;

class ProducentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producent::create([
            'name' => 'Quiksilver'
          ]);
        Producent::create([
            'name' => 'Roxy'
        ]);
        Producent::create([
            'name' => 'Volcom'
        ]);
    }
}
