<?php

use DCStore\Links;
use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Links::class)->times(200)->create();
    }
}
