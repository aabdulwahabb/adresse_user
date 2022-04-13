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
              $table->integer('adresse')->index('adresse');
              $table->integer('projekt')->index('projekt');
              $table->string('subjekt')->index();
              $table->string('praedikat')->index();
              $table->string('objekt')->index();
              $table->string('parameter')->index();
              $table->date('von');
              $table->date('bis')->default(0000-00-00);
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
