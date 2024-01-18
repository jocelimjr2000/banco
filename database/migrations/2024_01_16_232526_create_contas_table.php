<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('n_conta', 40);
            $table->float('saldo');
            $table->unsignedBigInteger('id_tipo');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_tipo')
                ->references('id')
                ->on('tipos');

            $table->foreign('id_cliente')
                ->references('id')
                ->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
