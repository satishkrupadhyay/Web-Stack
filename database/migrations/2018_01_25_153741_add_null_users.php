<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('email', 250)->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('user_locality', 50)->nullable()->change();
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
    }
}
