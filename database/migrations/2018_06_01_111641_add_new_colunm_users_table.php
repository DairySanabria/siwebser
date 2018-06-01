<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColunmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Se crea una columna a una tabla de la base de datos para los registros del id del facebook
        Schema::table('users', function(Blueprint $table) {
            $table->string('facebook_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('facebook_id');
        });
    }
}
