<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresseRolleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      if (!app()->environment('production')) {
             Schema::create('adresse_rolle', function (Blueprint $table) {
              $table->id();
              $table->integer('adresse');
              $table->string('objekt');
              $table->string('parameter');
              $table->string('praedikat');
              $table->integer('projekt');
              $table->string('subjekt');
                $table->date('bis')->default(0000-00-00);
              $table->date('von');
             });
          }
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       if (!app()->environment('production')) {
             Schema::dropIfExists('adresse_rolle');
     }
   }
 }
