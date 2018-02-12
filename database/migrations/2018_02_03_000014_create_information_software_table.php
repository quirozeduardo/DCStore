<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationSoftwareTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'information_software';

    /**
     * Run the migrations.
     * @table information_software
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',100);
            $table->string('title', 70);
            $table->unsignedInteger('lenguage');
            $table->unsignedInteger('size');

            $table->primary('id');

            $table->index(["lenguage"], 'information_software_lenguage_idx');
            $table->index(["id"], 'information_software_article_idx');

            $table->unique(["id"], 'id_UNIQUE');

            $table->foreign('id', 'information_software_article_idx')
                ->references('id')->on('article')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('lenguage', 'information_software_lenguage_idx')
                ->references('id')->on('lenguage')
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
