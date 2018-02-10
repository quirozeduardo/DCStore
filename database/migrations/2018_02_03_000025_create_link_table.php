<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'link';

    /**
     * Run the migrations.
     * @table link
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 30);
            $table->string('link',1024);
            $table->string('password',512)->nullable();
            $table->string('description',512)->nullable();
            $table->unsignedInteger('server');

            $table->index(["id"], 'link_links_idx');

            $table->index(["server"], 'link_server_idx');


            $table->foreign('id', 'link_links_idx')
                ->references('id')->on('links')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('server', 'link_server_idx')
                ->references('id')->on('server')
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
