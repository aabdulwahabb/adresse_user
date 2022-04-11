<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerkaufspreiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('verkaufspreise', function (Blueprint $table) {
                $table->id();
                $table->integer('artikel')->index('artikel');
                $table->string('objekt');
                $table->string('projekt')->index('projekt');
                $table->string('adresse')->index('adresse');
                $table->decimal('preis', 18, 8)->default(0.00000000);
                $table->string('waehrung');
                $table->decimal('ab_menge', 14, 4)->default(1.0000);
                $table->string('vpe', 64)->default('1');
                $table->decimal('vpe_menge', 14, 4)->default(0.0000);
                $table->date('angelegt_am');
                $table->date('gueltig_bis');
                $table->text('bemerkung');
                $table->string('bearbeiter');
                $table->timestamp('logdatei')->default('0000-00-00 00:00:00')->useCurrentOnUpdate();
                $table->integer('firma');
                $table->integer('geloescht');
                $table->string('kundenartikelnummer')->nullable()->index('kundenartikelnummer');
                $table->string('art')->default('Kunde');
                $table->integer('gruppe')->nullable();
                $table->boolean('apichange')->default(0);
                $table->boolean('nichtberechnet')->default(1);
                $table->date('gueltig_ab')->default('0000-00-00');
                $table->boolean('inbelegausblenden')->default(0);
                $table->decimal('kurs', 14, 4)->nullable()->default(-1.0000);
                $table->date('kursdatum')->nullable();
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
            Schema::dropIfExists('verkaufspreise');
        }
    }
}
