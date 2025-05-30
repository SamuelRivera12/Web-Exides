<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dateTime('ultima_sesion')->nullable();
        $table->string('estado')->default('activo'); // o ->boolean('activo')->default(true)
        //agregar campo role
        $table->string('role')->default('user'); // o ->enum('role', ['user', 'admin'])->default('user')
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['ultima_sesion', 'estado']);
    });
}
};
