<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rechercher extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rechercher', function (Blueprint $table) {
            $table->id();
            $table->string('ville_depart');
            $table->string('ville_d_arrivee');
            $table->date('date_depart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rechercher');
    }
}
