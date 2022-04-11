<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLagerPlatzInhaltTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lager_platz_inhalt', function (Blueprint $table) {
                $table->id();
                $table->integer('lager_platz')->index();
                $table->integer('artikel')->index();
                $table->decimal('menge')->index();
                $table->string('vpe')->varchar();
                $table->string('bearbeiter')->varchar();
                $table->integer('bestellung');
                $table->integer('projekt');
                $table->integer('firma');
                $table->timestamp('logdatei');
                $table->integer('inventur');
                $table->integer('lager_platz_vpe');
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
            Schema::dropIfExists('lager_platz_inhalt');
        }
    }
}
