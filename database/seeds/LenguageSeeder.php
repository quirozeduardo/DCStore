<?php

use DCStore\Lenguage;
use Illuminate\Database\Seeder;

class LenguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lenguage::class)->times(90)->create();
    }
}
