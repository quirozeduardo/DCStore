<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user';

    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id',20);
            $table->string('name', 70);
            $table->string('last_name', 70);
            $table->string('email',256);
            $table->string('password',256);            
            $table->unsignedInteger('type');
            $table->rememberToken();
            $table->timestamps();
            
            $table->primary('id');

            $table->index(["type"], 'user_user_type_idx');
            


            $table->foreign('type', 'user_user_type_idx')
                ->references('id')->on('user_type')
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
