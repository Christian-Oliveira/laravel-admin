<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblsetor', function (Blueprint $table) {
            $table->increments('intsetorid');
            $table->string('strsetor');
            $table->string('strsigla')->nullable();
            $table->integer('idpolo')->unsigned();
            $table->boolean('bolativo')->deafult(1);
            $table->timestamps();

            $table->foreign('idpolo')
                ->references('intpoloid')->on('tblpolo')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblsetor');
    }
}
