<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('marque');
            $table->string('modele');
            $table->string('couleur');
            $table->string('type');
            $table->string('photo')->nullable();
            $table->integer('nombre_places');
            $table->boolean('climatisee');
            $table->boolean('assuree');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voitures');
    }
}
