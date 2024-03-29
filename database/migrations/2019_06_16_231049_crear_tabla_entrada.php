<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEntrada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fechaHora');
            $table->unsignedBigInteger('idcomprobante');
            $table->foreign('idcomprobante')->references('id')->on('comprobante')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('idproveedor')->nullable();
            $table->foreign('idproveedor')->references('id')->on('proveedor')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada');
    }
}
