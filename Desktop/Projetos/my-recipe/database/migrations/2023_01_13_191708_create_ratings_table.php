<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('recipe_id')
                ->constrained();

            $table->string('comment', 255)
                ->comment('Comentário do avaliador.');

            $table->integer('ranking')
                ->comment('Ranking de 1 ~ 5');

            $table->boolean('like');

            $table->boolean('deslike');

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
        Schema::dropIfExists('ratings');
    }
}
