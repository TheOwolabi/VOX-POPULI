<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorisablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorisables', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('categorisable_id');
            $table->string('categorisable_type');
            $table->unique(['categorie_id','categorisable_id','categorisable_type']);
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
        Schema::dropIfExists('categorisables');
    }
}
