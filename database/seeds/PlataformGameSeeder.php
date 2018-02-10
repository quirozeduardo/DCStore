<?php

use DCStore\PlataformGame;
use Illuminate\Database\Seeder;

class PlataformGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PlataformGame::class)->times(5)->create();
    }
}
