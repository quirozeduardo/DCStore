<?php

use DCStore\Genders;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Genders::class)->times(50)->create();
    }
}
