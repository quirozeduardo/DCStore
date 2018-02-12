<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsGameTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'requirements_game';

    /**
     * Run the migrations.
     * @table requirements_game
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 100);
            $table->unsignedInteger('os');
            $table->string('cpu', 45);
            $table->integer('ram');
            $table->string('graphics', 45);
            $table->string('opengl', 45);
            $table->string('directx', 45);
            $table->integer('disk');

            $table->index(["os"], 'requirements_game_os_idx');
            $table->index(["id"], 'requirements_information_game_idx');

            $table->unique(["id"], 'idrequirements_game_UNIQUE');


            $table->foreign('os', 'requirements_game_os_idx')
                ->references('id')->on('os')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('id', 'requirements_information_game_idx')
                ->references('id')->on('information_game')
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
