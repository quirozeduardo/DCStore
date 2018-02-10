<?php

use DCStore\FeatureSoftware;
use Illuminate\Database\Seeder;

class FeatureSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FeatureSoftware::class)->times(50)->create();
    }
}
