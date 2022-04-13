<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      if (!app()->environment('production')) {
             Schema::create('userrights', function (Blueprint $table) {
               $table->id();
               $table->integer('user')->index('user');
               $table->string('module',64);
               $table->string('action',64);
               $table->boolean('permission');

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
             Schema::dropIfExists('userrights');
     }
   }
 }
