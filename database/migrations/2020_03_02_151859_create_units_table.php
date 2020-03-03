<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_units', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type_unit', [0=>'SEDE', 1=>'UR', 2=>'ULSAV', 3=>'EAC', 4=>'BARREIRA']);
            $table->string('initials')->nullable();
            $table->string('name');
            $table->boolean('active')->default(1);
            $table->integer('r_auth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_units');
    }
}
