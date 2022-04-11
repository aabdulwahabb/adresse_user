<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLagerPlatzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lager_platz', function (Blueprint $table) {
                $table->id();
                $table->integer('lager')->index();
                $table->string('kurzbezeichnung')->varchar()->index();
                $table->text('bemerkung');
                $table->integer('projekt');
                $table->integer('firma');
                $table->integer('geloescht');
                $table->timestamp('logdatei');
                $table->integer('autolagersperre');
                $table->integer('verbrauchslager');
                $table->integer('sperrlager');
                $table->integer('palettenlager');
                $table->tinyInteger('lhm');
                $table->integer('fachbodenlager');
                $table->integer('lagerkategorie');
                $table->decimal('laenge');
                $table->decimal('breite');
                $table->decimal('hoehe');
                $table->integer('poslager');
                $table->integer('adresse');
                $table->bigInteger('rownumber');
                $table->string('abckategorie')->varchar();
                $table->string('regalart')->varchar();
                $table->tinyInteger('allowproduction');
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
            Schema::dropIfExists('lager_platz');
        }
    }
}
