<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lager', function (Blueprint $table) {
                $table->id();
                $table->string('bezeichnung')->varchar();
                $table->text('beschreibung');
                $table->integer('manuell');
                $table->integer('firma');
                $table->integer('geloescht');
                $table->timestamp('logdatei');
                $table->integer('projekt');
                $table->integer('adresse');
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
            Schema::dropIfExists('lager');
        }
    }
}
