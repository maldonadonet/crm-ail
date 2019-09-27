<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla: Detalle_cotizaciones
        Schema::create('details_quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quotes_id'); //id_cotizacion
            $table->string('product');
            $table->decimal('price',8,2);
            $table->integer('quantity');
            $table->decimal('total',8,2);
            $table->string('observations');
            $table->timestamps();

            $table->foreign('quotes_id')->references('id')->on('quotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_quotes');
    }
}
