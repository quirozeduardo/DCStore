<?php

use DCStore\InformationSoftware;
use Illuminate\Database\Seeder;

class InformationSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(InformationSoftware::class)->times(50)->create();
    }
}
