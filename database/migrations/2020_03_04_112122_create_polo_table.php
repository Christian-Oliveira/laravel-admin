<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpolo', function (Blueprint $table) {
            $table->increments('intpoloid');
            $table->string('strpolo');
            $table->integer('intenderecoid')->unsigned()->nullable();
            $table->enum('bolpublicar', [0=>'Não', 1=>'Sim']);
            $table->enum('inttipopoloid', [0 => 'SEDE', 1 => 'UR', 2 => 'ULSAV', 3 => 'EAC', 4 => 'BARREIRA']);
            $table->boolean('bolativo')->default(1);
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
        Schema::dropIfExists('tblpolo');
    }
}
