<?php

use DCStore\ArticleType;
use Illuminate\Database\Seeder;


class ArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ArticleType::class)->times(4)->create();
    }
}
