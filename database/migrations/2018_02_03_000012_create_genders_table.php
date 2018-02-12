<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGendersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'genders';

    /**
     * Run the migrations.
     * @table genders
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 100);
            $table->unsignedInteger('gender');

            $table->index(["gender"], 'genders_gender_idx');
            $table->index(["id"], 'genders_datasheet_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('gender', 'genders_gender_idx')
                ->references('id')->on('gender')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id', 'genders_datasheet_idx')
                ->references('id')->on('datasheet')
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
