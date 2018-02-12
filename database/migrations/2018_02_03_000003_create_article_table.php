<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'article';

    /**
     * Run the migrations.
     * @table article
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',100);
            $table->unsignedInteger('type');
            $table->string('image',1024);
            $table->string('created_by', 20);
            $table->string('updated_by', 20);
            $table->timestamps();
            
            $table->primary('id');

            $table->index(["type"], 'article_article_type_idx');

            $table->index(["created_by"], 'article_user_idx');

            $table->index(["updated_by"], 'article_user_2_idx');
            


            $table->foreign('type', 'article_article_type_idx')
                ->references('id')->on('article_type')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('created_by', 'article_user_idx')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('updated_by', 'article_user_2_idx')
                ->references('id')->on('user')
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
