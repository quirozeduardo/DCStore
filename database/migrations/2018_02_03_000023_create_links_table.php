<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'links';

    /**
     * Run the migrations.
     * @table links
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',30);
            $table->string('article', 100);
            $table->unsignedInteger('type');
            $table->string('description',512)->nullable();

            $table->primary('id');

            $table->index(["type"], 'links_links_type_idx');

            $table->index(["article"], 'links_article_idx');


            $table->foreign('type', 'links_links_type_idx')
                ->references('id')->on('links_type')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('article', 'links_article_idx')
                ->references('id')->on('article')
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
