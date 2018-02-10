<?php

use DCStore\FormatGame;
use Illuminate\Database\Seeder;

class FormatGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FormatGame::class)->times(10)->create();
    }
}
