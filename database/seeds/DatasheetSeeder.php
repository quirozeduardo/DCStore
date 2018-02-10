<?php

use DCStore\Datasheet;
use Illuminate\Database\Seeder;

class DatasheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Datasheet::class)->times(50)->create();
    }
}
