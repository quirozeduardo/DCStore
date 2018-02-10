<?php

use DCStore\Quality;
use Illuminate\Database\Seeder;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quality::class)->times(10)->create();
    }
}
