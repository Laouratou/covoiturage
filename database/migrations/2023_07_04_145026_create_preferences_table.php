<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Colonne pour la clé étrangère
            $table->string('espace_bagage');
            $table->string('nmbre_passager');
            $table->json('preferencesup')->nullable();
            $table->text('comment')->nullable();
            $table->string('num_paiement');
            $table->string('compte_mobile');
            $table->timestamps();

            // Définir la clé étrangère user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
