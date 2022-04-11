<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLagerReserviertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lager_reserviert', function (Blueprint $table) {
                $table->id();
                $table->integer('adresse');
                $table->integer('artikel');
                $table->decimal('menge', 14 ,4)->default(0.0000);
                $table->string('grund', 255);
                $table->string('objekt', 255);
                $table->integer('parameter');
                $table->integer('projekt');
                $table->integer('firma');
                $table->string('bearbeiter', 255);
                $table->date('datum');
                $table->timestamp('reserviertdatum')->useCurrent()->useCurrentOnUpdate();
                $table->integer('posid');
                $table->integer('lager_platz');
                $table->integer('lager');

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
            Schema::dropIfExists('lager_reserviert');
        }
    }
}
