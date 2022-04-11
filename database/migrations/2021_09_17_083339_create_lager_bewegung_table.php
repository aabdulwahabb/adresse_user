<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLagerBewegungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lager_bewegung', function (Blueprint $table) {
                $table->id();
                $table->integer('lager_platz');
                $table->integer('artikel')->index();
                $table->decimal('menge');
                $table->string('vpe')->varchar();
                $table->integer('eingang');
                $table->dateTime('zeit');
                $table->string('referenz')->varchar();
                $table->string('bearbeiter')->varchar();
                $table->integer('projekt');
                $table->integer('firma');
                $table->timestamp('logdatei');
                $table->integer('adresse');
                $table->decimal('bestand');
                $table->tinyInteger('permanenteinventur');
                $table->integer('paketannahme');
                $table->string('doctype')->varchar();
                $table->integer('doctypeid');
                $table->integer('vpeid');
                $table->tinyInteger('is_interim');
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
            Schema::dropIfExists('lager_bewegung');
        }
    }
}
