<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla: Seguimiento
        Schema::create('tracing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quotes_id'); //id_cotizacion
            $table->string('type_call',300);
            $table->date('date');
            $table->string('observations',500)->nullable();
            $table->date('appointment')->nullable(); // cita
            $table->string('bill')->nullable(); // factura
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
        Schema::dropIfExists('tracing');
    }
}
