<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//disable foreign key check for this connection before running seeders
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	//truncate all tables
        DB::table('link')->truncate();
        DB::table('server')->truncate();
        DB::table('links')->truncate();
        DB::table('links_type')->truncate();
        DB::table('requirements_game')->truncate();
        DB::table('information_game')->truncate();
        DB::table('os')->truncate();
        DB::table('gender_game')->truncate();
        DB::table('plataform_game')->truncate();
        DB::table('format_game')->truncate();
        DB::table('feature_software')->truncate();
        DB::table('information_software')->truncate();
        DB::table('photo')->truncate();
        DB::table('genders')->truncate();
        DB::table('gender')->truncate();
        DB::table('datasheet')->truncate();
        DB::table('country')->truncate();
        DB::table('information')->truncate();
        DB::table('subtitles')->truncate();
        DB::table('lenguage')->truncate();
        DB::table('format')->truncate();
    	DB::table('quality')->truncate();
        DB::table('article')->truncate();
        DB::table('user')->truncate();
    	DB::table('user_type')->truncate();
    	DB::table('article_type')->truncate();

    	// supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(ArticleTypeSeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(ArticleSeeder::class);
        $this->call(QualitySeeder::class);
        $this->call(FormatSeeder::class);
        $this->call(LenguageSeeder::class);
        $this->call(SubtitlesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(InformationSoftwareSeeder::class);
        $this->call(FeatureSoftwareSeeder::class);
        $this->call(FormatGameSeeder::class);
        $this->call(PlataformGameSeeder::class);
        $this->call(GenderGameSeeder::class);
        $this->call(OSSeeder::class);
        $this->call(RequirementsGameSeeder::class);
        $this->call(LinksTypeSeeder::class);
        $this->call(LinksSeeder::class);
        $this->call(ServerSeeder::class);
        $this->call(LinkSeeder::class);
    }
}
