<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla: Cotizaciones
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('leaflets_id');
            $table->integer('id_user');
            $table->date('date');
            $table->string('folio');
            $table->string('observations');
            $table->timestamps();

            $table->foreign('leaflets_id')->references('id')->on('leaflets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
