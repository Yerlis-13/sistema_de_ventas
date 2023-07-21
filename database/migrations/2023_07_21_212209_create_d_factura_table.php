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
    public function up(): void
    {
        Schema::create('d_factura', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',10,2);
            $table->decimal('cantidad',10,2);


            $table->bigInteger('productos_id')->unsigned();
            $table->bigInteger('factura_id')->unsigned();

            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('factura_id')->references('id')->on('factura')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('d_factura');
    }
};
