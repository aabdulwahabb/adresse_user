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
               $table->string('action',64);
               $table->string('module',64);
               $table->boolean('permission');
               $table->integer('user');
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
