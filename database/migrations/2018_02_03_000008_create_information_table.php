<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'information';

    /**
     * Run the migrations.
     * @table information
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',100);
            $table->unsignedInteger('quality');
            $table->unsignedInteger('format');
            $table->unsignedInteger('resolution_w');
            $table->unsignedInteger('resolution_h');
            $table->unsignedInteger('size');
            $table->unsignedInteger('lenguage');
            $table->unsignedInteger('subtitles');

            $table->primary('id');

            $table->index(["id"], 'information_article_idx');

            $table->index(["subtitles"], 'information_quality_subtitles_idx');

            $table->index(["quality"], 'information_quality_quality_idx');

            $table->index(["lenguage"], 'information_quality_lenguage_idx');

            $table->index(["format"], 'information_quality_format_idx');

            $table->unique(["id"], 'id_UNIQUE');



            $table->foreign('id', 'information_article_idx')
                ->references('id')->on('article')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('quality', 'information_quality_quality_idx')
                ->references('id')->on('quality')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('format', 'information_quality_format_idx')
                ->references('id')->on('format')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('lenguage', 'information_quality_lenguage_idx')
                ->references('id')->on('lenguage')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('subtitles', 'information_quality_subtitles_idx')
                ->references('id')->on('subtitles')
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
