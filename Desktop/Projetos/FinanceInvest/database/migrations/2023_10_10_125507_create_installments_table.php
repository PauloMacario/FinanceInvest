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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->integer('installment');
            $table->decimal('value', 10,2);
            $table->date('paydate');
            $table->enum('status', ['PO', 'NP', 'CN' ])
                ->default('NP')
                ->comment('PO-> paid out | NP-> Not paid| CN-> canceled')
            ;
            $table->timestamps();

            $table->foreign('purchase_id')
                ->references('id')
                ->on('purchases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
};
