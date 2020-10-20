<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
   
            $table->text('description')->nullable();
        
            $table->unsignedBigInteger('userid');
       
            $table->boolean('ispinned')->default(false);
      
            $table->boolean('isarchived')->default(false);
    
            $table->boolean('istrash')->default(false);

            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('notes');
    }
}
