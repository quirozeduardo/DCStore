<?php

use DCStore\GenderGame;
use Illuminate\Database\Seeder;

class GenderGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GenderGame::class)->times(10)->create();
    }
}
