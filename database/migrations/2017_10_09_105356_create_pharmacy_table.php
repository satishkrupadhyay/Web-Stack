<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('medical_store', function (Blueprint $table) {
            
            $table->increments('id');            
            $table->string('store_name');
            $table->string('owner_name');
            $table->string('store_email', 250)->unique();
            $table->string('password');
            $table->double('phone');            
            $table->string('address');        
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
        Schema::dropIfExists('medical_store');
    }
}
