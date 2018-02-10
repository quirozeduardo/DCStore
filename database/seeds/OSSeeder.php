<?php

use DCStore\OS;
use Illuminate\Database\Seeder;

class OSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OS::class)->times(4)->create();
    }
}
