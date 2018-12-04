<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('bio')->nullable();
            $table->string('gender');
            $table->string('occupation')->nullable();
            $table->string('reasons_for_nomination')->nullable();
            $table->string('image')->nullable();
            $table->integer('no_of_nominations');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('no_of_votes')->default(0)->nullable();
            $table->boolean('is_won')->default(0)->nullable();
            $table->boolean('is_admin_selected')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominations');
    }
}
