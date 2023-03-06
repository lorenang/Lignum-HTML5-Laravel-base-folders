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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->year('year');
            $table->string('title');
            $table->string('time');
            $table->string('sinopsis');
            $table->string('img');
            $table->unsignedBigInteger('ActorPrincipalID');

            $table->unsignedBigInteger('ActorSecundarioID');

            $table->softDeletes(); #este campo almacena la fecha y hora en que un registro es eliminado de la tabla

            $table->foreign('ActorPrincipalID')
                ->references('idActor')
                ->on('actor')
                ->onDelete('cascade');

            $table->foreign('ActorSecundarioID')
                ->references('idActor')
                ->on('actor')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
