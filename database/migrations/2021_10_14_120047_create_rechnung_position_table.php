<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechnungPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('rechnung_position', function (Blueprint $table) {
                $table->id();
                $table->integer('rechnung')->index('rechnung');
                $table->integer('artikel')->index('artikel');
                $table->integer('projekt');
                $table->string('bezeichnung');
                $table->text('beschreibung');
                $table->text('internerkommentar');
                $table->string('nummer');
                $table->decimal('menge', 14, 4);
                $table->decimal('preis', 18, 8)->default(0.00000000);
                $table->string('waehrung');
                $table->date('lieferdatum');
                $table->string('vpe');
                $table->integer('sort');
                $table->string('status');
                $table->string('umsatzsteuer');
                $table->text('bemerkung');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->decimal('rabatt', 10, 2);
                $table->string('einheit')->default('');
                $table->decimal('punkte', 10, 2);
                $table->decimal('bonuspunkte', 10, 2);
                $table->decimal('mlmkopfgeld', 10, 2)->nullable();
                $table->decimal('mlmdirektpraemie', 10, 2)->nullable();
                $table->integer('mlm_abgerechnet')->nullable();
                $table->integer('explodiert_parent_artikel')->default(0);
                $table->integer('keinrabatterlaubt')->nullable();
                $table->decimal('grundrabatt', 10, 2)->nullable();
                $table->integer('rabattsync')->nullable();
                $table->decimal('rabatt1', 10, 2)->nullable();
                $table->decimal('rabatt2', 10, 2)->nullable();
                $table->decimal('rabatt3', 10, 2)->nullable();
                $table->decimal('rabatt4', 10, 2)->nullable();
                $table->decimal('rabatt5', 10, 2)->nullable();
                $table->string('zolltarifnummer', 128)->default('0');
                $table->string('herkunftsland', 128)->default('0');
                $table->string('artikelnummerkunde', 128)->default('');
                $table->boolean('lieferdatumkw')->default(0);
                $table->integer('auftrag_position_id')->default(0)->index('auftrag_position_id');
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
                $table->string('einkaufspreiswaehrung', 8)->default('');
                $table->decimal('einkaufspreis', 18, 8)->default(0.00000000);
                $table->decimal('einkaufspreisurspruenglich', 18, 8)->default(0.00000000);
                $table->integer('einkaufspreisid')->default(0);
                $table->string('ekwaehrung', 8)->default('');
                $table->decimal('deckungsbeitrag', 18, 8)->default(0.00000000);
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
                $table->string('formelmenge')->default('');
                $table->string('formelpreis')->default('');
                $table->integer('ohnepreis')->default(0);
                $table->decimal('skontobetrag', 14, 4)->nullable();
                $table->decimal('steuerbetrag', 14, 4)->nullable();
                $table->boolean('skontosperre')->default(0);
                $table->boolean('ausblenden_im_pdf')->nullable()->default(0);
                $table->decimal('umsatz_netto_einzeln', 14, 4)->nullable();
                $table->decimal('umsatz_netto_gesamt', 14, 4)->nullable();
                $table->decimal('umsatz_brutto_einzeln', 14, 4)->nullable();
                $table->decimal('umsatz_brutto_gesamt', 14, 4)->nullable();
                $table->decimal('skontobetrag_netto_einzeln', 14, 4)->nullable();
                $table->decimal('skontobetrag_netto_gesamt', 14, 4)->nullable();
                $table->decimal('skontobetrag_brutto_einzeln', 14, 4)->nullable();
                $table->decimal('skontobetrag_brutto_gesamt', 14, 4)->nullable();
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
        Schema::dropIfExists('rechnung_position');
    }
}
