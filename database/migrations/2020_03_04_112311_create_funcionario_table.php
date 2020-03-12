<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfuncionario', function (Blueprint $table) {
            $table->increments('idfuncionario');
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->string('strnome');
            $table->string('strchave_config', 100);
            $table->integer('profile_id')->default(1);
            $table->integer('idsetor')->unsigned();
            $table->enum('idstatus', [0 => 'inativo', 1 => 'ativo']);
            $table->boolean('bolativo')->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idsetor')
                ->references('intsetorid')->on('tblsetor')
                ->onDelete('cascade');

            $table->foreign('strchave_config')
                ->references('strchave')->on('tblconfig')
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
        Schema::dropIfExists('tblfuncionario');
    }
}
