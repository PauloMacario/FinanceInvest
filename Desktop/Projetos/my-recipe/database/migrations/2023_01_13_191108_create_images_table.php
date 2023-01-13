<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->string('type', 2)
                ->comment('RC=> imagens de receitas | CG=> imagens de categorias | FD=> imagens de folders de compartilhamento ');

            $table->string('name', 50)
                ->comment('Nome do arquivo da imagem.');

            $table->string('extension', 5)
                ->comment('Nome da extenção do arquivo da imagem.');

            $table->string('patch', 255)
                ->comment('Caminho do storage da imagem.');

            $table->string('icon', 50)
                ->comment('TAG de icone: fontawesome')
                ->nullable();

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
        Schema::dropIfExists('images');
    }
}
