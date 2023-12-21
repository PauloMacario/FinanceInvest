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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('segment_id');
            $table->unsignedBigInteger('shopper_id');
            $table->date('date');
            $table->string('description', 128);
            $table->string('trade_name', 128);
            $table->decimal('value', 10,2);
            $table->integer('number_installments')
                ->nullable();
            $table->integer('processing_day')
                ->nullable();
            $table->integer('payday')
                ->nullable();
            $table->enum('status', ['PO', 'NP', 'CN' ])
                ->default('NP')
                ->comment('PO-> paid out | NP-> Not paid| CN-> canceled')
            ;
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('types');

            $table->foreign('segment_id')
                ->references('id')
                ->on('segments');

            $table->foreign('shopper_id')
                ->references('id')
                ->on('shoppers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
