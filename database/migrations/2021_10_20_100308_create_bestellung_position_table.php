<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestellungPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('bestellung_position', function (Blueprint $table) {
                $table->id();
                $table->integer('bestellung');
                $table->integer('artikel');
                $table->integer('projekt');
                $table->string('bezeichnunglieferant');
                $table->string('bestellnummer');
                $table->text('beschreibung');
                $table->decimal('menge', 14, 4);
                $table->decimal('preis', 18, 8)->default(0.00000000);
                $table->string('waehrung');
                $table->date('lieferdatum');
                $table->string('vpe');
                $table->integer('sort');
                $table->string('status');
                $table->string('umsatzsteuer');
                $table->text('bemerkung');
                $table->decimal('geliefert', 14, 4);
                $table->dateTime('eingangsdatum');
                $table->integer('mengemanuellgeliefertaktiviert');
                $table->string('manuellgeliefertbearbeiter');
                $table->integer('abgerechnet');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->integer('abgeschlossen')->nullable();
                $table->string('einheit')->default('');
                $table->string('zolltarifnummer', 128)->default('0');
                $table->string('herkunftsland', 128)->default('0');
                $table->integer('auftrag_position_id')->default(0);
                $table->decimal('auswahlmenge', 14, 4)->nullable();
                $table->integer('auswahletiketten')->nullable();
                $table->integer('auswahllagerplatz')->nullable();
                $table->integer('preisanfrage_position_id')->default(0);
                $table->text('freifeld1')->nullable();
                $table->text('freifeld2')->nullable();
                $table->text('freifeld3')->nullable();
                $table->text('freifeld4')->nullable();
                $table->text('freifeld5')->nullable();
                $table->text('freifeld6')->nullable();
                $table->text('freifeld7')->nullable();
                $table->text('freifeld8')->nullable();
                $table->text('freifeld9')->nullable();
                $table->text('freifeld10')->nullable();
                $table->integer('teilprojekt')->default(0);
                $table->decimal('steuersatz', 5, 2)->nullable();
                $table->string('steuertext', 1024)->nullable();
                $table->string('erloese', 8)->nullable();
                $table->text('freifeld11')->nullable();
                $table->text('freifeld12')->nullable();
                $table->text('freifeld13')->nullable();
                $table->text('freifeld14')->nullable();
                $table->text('freifeld15')->nullable();
                $table->text('freifeld16')->nullable();
                $table->text('freifeld17')->nullable();
                $table->text('freifeld18')->nullable();
                $table->text('freifeld19')->nullable();
                $table->text('freifeld20')->nullable();
                $table->string('artikelnummerkunde', 128)->default('');
                $table->string('kostenstelle', 10)->default('');
                $table->boolean('erloesefestschreiben')->default(0);
                $table->text('freifeld21')->nullable();
                $table->text('freifeld22')->nullable();
                $table->text('freifeld23')->nullable();
                $table->text('freifeld24')->nullable();
                $table->text('freifeld25')->nullable();
                $table->text('freifeld26')->nullable();
                $table->text('freifeld27')->nullable();
                $table->text('freifeld28')->nullable();
                $table->text('freifeld29')->nullable();
                $table->text('freifeld30')->nullable();
                $table->text('freifeld31')->nullable();
                $table->text('freifeld32')->nullable();
                $table->text('freifeld33')->nullable();
                $table->text('freifeld34')->nullable();
                $table->text('freifeld35')->nullable();
                $table->text('freifeld36')->nullable();
                $table->text('freifeld37')->nullable();
                $table->text('freifeld38')->nullable();
                $table->text('freifeld39')->nullable();
                $table->text('freifeld40')->nullable();
                $table->decimal('skontobetrag', 14, 4)->nullable();
                $table->decimal('skontobetrag_netto_einzeln', 14, 4)->nullable();
                $table->decimal('skontobetrag_netto_gesamt', 14, 4)->nullable();
                $table->decimal('skontobetrag_brutto_einzeln', 14, 4)->nullable();
                $table->decimal('skontobetrag_brutto_gesamt', 14, 4)->nullable();
                $table->index(['bestellung', 'artikel'], 'bestellung');
                $table->index(['artikel', 'menge', 'geliefert', 'status'], 'artikel');
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
            Schema::dropIfExists('bestellung_position');
        }
    }
}
