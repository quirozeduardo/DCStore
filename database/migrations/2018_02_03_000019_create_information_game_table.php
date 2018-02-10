<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationGameTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'information_game';

    /**
     * Run the migrations.
     * @table information_game
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',30);
            $table->string('title', 45);
            $table->timestamp('release_date');
            $table->unsignedInteger('format');
            $table->unsignedInteger('plataform');
            $table->unsignedInteger('size');
            $table->unsignedInteger('lenguage');
            $table->unsignedInteger('gender');

            $table->primary('id');

            $table->index(["gender"], 'information_software__gender_game_idx');
            $table->index(["id"], 'information_article_game_idx');

            $table->index(["plataform"], 'information_software_plataform_game_idx');

            $table->index(["format"], 'information_software_format_game_idx');

            $table->index(["lenguage"], 'information_lenguage_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('id', 'information_article_game_idx')
                ->references('id')->on('article')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('format', 'information_software_format_game_idx')
                ->references('id')->on('format_game')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('lenguage', 'information_lenguage_idx')
                ->references('id')->on('lenguage')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('plataform', 'information_software_plataform_game_idx')
                ->references('id')->on('plataform_game')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('gender', 'information_software__gender_game_idx')
                ->references('id')->on('gender_game')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
