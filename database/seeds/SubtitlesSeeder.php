<?php

use DCStore\Subtitles;
use Illuminate\Database\Seeder;

class SubtitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subtitles::class)->times(5)->create();
    }
}
