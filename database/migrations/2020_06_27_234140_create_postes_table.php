<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('intitule')->unique();
            $table->string('fiche');
            $table->unsignedInteger('mandat');
            $table->unsignedBigInteger('officiel_id')->nullable();

            $table->foreign('officiel_id')->references('id')->on('officiels')->onDelete('SET NULL');  
       
            
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
        Schema::dropIfExists('postes');
    }
}
