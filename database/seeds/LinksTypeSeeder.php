<?php

use DCStore\LinksType;
use Illuminate\Database\Seeder;

class LinksTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LinksType::class)->times(3)->create();
    }
}
