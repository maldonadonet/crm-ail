<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeafletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla: Prospectos
        Schema::create('leaflets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',300);
            $table->string('empresa',300);
            $table->string('tel',20);
            $table->string('email',100)->unique();
            $table->string('sector',300);
            $table->string('source',300); // Fuente
            $table->integer('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaflets');
    }
}
