<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 5820); //According to the Guinness Book of World Records, the book with the longest title in the world contains 5,820 characters
            $table->date('release_date');
            $table->integer('author_id')->unsigned();
            $table->timestamps();
            $table->index([\DB::raw('name(100)')]);
        });
        
        Schema::table('books', function($table){
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
