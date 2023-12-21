<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained();

            $table->foreignId('image_id')
                ->constrained();

            $table->string('name', 50);

            $table->longText('ingredients');

            $table->longText('preparation_method')
                ->comment('Passo a Passo de como preparar.');

            $table->longText('extra_note')
                ->nullable()
                ->comment('Observação ou nota extra para melhorar algum procedimento.');

            $table->time('estimated_time')
                ->nullable()
                ->comment('Tempo estimado até conclusão do preparo.');

            $table->integer('people_served')
                ->nullable()
                ->comment('Quantidade de pessoas que a receita serve.');

            $table->longText('tips')
                ->nullable()
                ->comment('Dicas sobre algum procedimento da receita ou pós receita.');
                
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
        Schema::dropIfExists('recipes');
    }
}
