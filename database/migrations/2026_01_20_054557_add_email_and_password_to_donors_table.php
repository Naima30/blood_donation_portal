<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailAndPasswordToDonorsTable extends Migration
{
    public function up()
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->string('email');
            $table->string('password');

        });
    }

    public function down()
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->dropColumn(['email', 'password']);
        });
    }
}
