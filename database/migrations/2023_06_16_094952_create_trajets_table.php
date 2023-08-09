<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->string('ville_de_depart');
            $table->string('ville_d_arrivee');
            $table->time('heure_depart');
            $table->float('prix_par_place')->default(0); // Add this line
            $table->time('heure_d_arrivee');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_trajets_user_id')->references('id')->on('users');
            $table->integer('place_disponibles');
            $table->string('role')->default('conducteur');
            $table->date('date_depart');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
}
