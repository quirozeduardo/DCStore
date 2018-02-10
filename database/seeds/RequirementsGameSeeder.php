<?php

use DCStore\RequirementsGame;
use Illuminate\Database\Seeder;

class RequirementsGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RequirementsGame::class)->times(50)->create();
    }
}
