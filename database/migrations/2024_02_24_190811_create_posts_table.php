<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id"); //Define el campo Id

            $table->bigInteger("user_id")->unsigned();//inicializa FK

            $table->string("title");	
            $table->string("slug")->unique();//no hay 2 slugs iguales

            $table->string("image")->nullable();//puede haber img o no

            
            
            $table->text("body");
            $table->text("iframe")->nullable(); //puede haber video o no


            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
