<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEinkaufspreiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!app()->environment('production')) {
            Schema::create('einkaufspreise', function (Blueprint $table) {
                $table->id();
                $table->integer('artikel')->index('artikel');
                $table->integer('adresse')->index('adresse');
                $table->string('objekt');
                $table->string('projekt')->index('projekt');
                $table->decimal('preis', 18, 8)->default(0.00000000);
                $table->string('waehrung');
                $table->decimal('ab_menge', 14, 4)->default(1.0000);
                $table->string('vpe', 64)->default('1');
                $table->date('preis_anfrage_vom');
                $table->date('gueltig_bis');
                $table->integer('lieferzeit_standard');
                $table->integer('lieferzeit_aktuell');
                $table->integer('lager_lieferant');
                $table->date('datum_lagerlieferant');
                $table->string('bestellnummer')->index('bestellnummer');
                $table->string('bezeichnunglieferant');
                $table->integer('sicherheitslager');
                $table->text('bemerkung');
                $table->string('bearbeiter');
                $table->timestamp('logdatei')->default('0000-00-00 00:00:00')->useCurrentOnUpdate();
                $table->integer('standard');
                $table->integer('geloescht');
                $table->integer('firma');
                $table->boolean('apichange')->default(0);
                $table->text('beschreibung');
                $table->boolean('nichtberechnet')->default(1);
                $table->boolean('rahmenvertrag')->default(0);
                $table->date('rahmenvertrag_von')->nullable();
                $table->date('rahmenvertrag_bis')->nullable();
                $table->integer('rahmenvertrag_menge')->default(0);
                $table->string('lieferzeit_standard_einheit', 64);
                $table->string('lieferzeit_aktuell_einheit', 64);
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
            Schema::dropIfExists('einkaufspreise');
        }
    }
}
