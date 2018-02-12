<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasheetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'datasheet';

    /**
     * Run the migrations.
     * @table datasheet
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 100);
            $table->string('original_title', 70);
            $table->string('another_title', 70);
            $table->integer('year');
            $table->integer('duration');
            $table->unsignedInteger('country');
            $table->string('directed', 70);
            $table->string('screenplay', 70);
            $table->string('music', 70);
            $table->string('cinematography', 70);
            $table->string('starring', 250);
            $table->string('production_company', 100);

            $table->index(["country"], 'datasheet_country_idx');
            $table->index(["id"], 'datasheet_information_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->foreign('country', 'datasheet_country_idx')
                ->references('id')->on('country')
                ->onDelete('no action')
                ->onUpdate('no action');
                
            $table->foreign('id', 'datasheet_information_idx')
                ->references('id')->on('information')
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
