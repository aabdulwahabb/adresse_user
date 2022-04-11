<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechnungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('rechnung', function (Blueprint $table) {
                $table->id();
                $table->date('datum');
                $table->integer('aborechnung');
                $table->string('projekt', 222)->index('projekt');
                $table->string('anlegeart');
                $table->string('belegnr')->index('belegnr');
                $table->string('auftrag');
                $table->integer('auftragid')->index('auftragid');
                $table->string('bearbeiter');
                $table->text('freitext');
                $table->text('internebemerkung');
                $table->string('status')->index('status');
                $table->integer('adresse')->index('adresse');
                $table->string('name');
                $table->string('abteilung');
                $table->string('unterabteilung');
                $table->string('strasse');
                $table->string('adresszusatz');
                $table->string('ansprechpartner');
                $table->string('plz');
                $table->string('ort');
                $table->string('land');
                $table->string('ustid');
                $table->integer('ust_befreit');
                $table->integer('ustbrief');
                $table->integer('ustbrief_eingang');
                $table->date('ustbrief_eingang_am');
                $table->string('email');
                $table->string('telefon');
                $table->string('telefax');
                $table->string('betreff');
                $table->string('kundennummer', 64)->nullable();
                $table->integer('lieferschein')->index('lieferschein');
                $table->string('versandart')->index('versandart');
                $table->date('lieferdatum');
                $table->string('buchhaltung');
                $table->string('zahlungsweise')->index('zahlungsweise');
                $table->string('zahlungsstatus')->index('zahlungsstatus');
                $table->decimal('ist', 18, 2)->default(0.00);
                $table->decimal('soll', 18, 2)->default(0.00);
                $table->decimal('skonto_gegeben', 10, 2);
                $table->integer('zahlungszieltage');
                $table->integer('zahlungszieltageskonto');
                $table->decimal('zahlungszielskonto', 10, 2);
                $table->integer('firma');
                $table->integer('versendet');
                $table->dateTime('versendet_am');
                $table->string('versendet_per');
                $table->string('versendet_durch');
                $table->integer('versendet_mahnwesen');
                $table->string('mahnwesen');
                $table->date('mahnwesen_datum');
                $table->integer('mahnwesen_gesperrt');
                $table->text('mahnwesen_internebemerkung');
                $table->integer('inbearbeitung');
                $table->integer('datev_abgeschlossen');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->integer('doppel')->nullable();
                $table->integer('keinsteuersatz')->nullable();
                $table->integer('ohne_briefpapier')->nullable();
                $table->integer('schreibschutz')->default(0);
                $table->integer('pdfarchiviert')->default(0);
                $table->integer('pdfarchiviertversion')->default(0);
                $table->string('ihrebestellnummer')->nullable();
                $table->date('forderungsverlust_datum')->nullable();
                $table->decimal('forderungsverlust_betrag', 10, 2)->nullable();
                $table->decimal('steuersatz_normal', 10, 2)->default(19.00);
                $table->decimal('steuersatz_zwischen', 10, 2)->default(7.00);
                $table->decimal('steuersatz_ermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_starkermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_dienstleistung', 10, 2)->default(7.00);
                $table->string('waehrung')->default('EUR');
                $table->integer('punkte')->nullable();
                $table->integer('bonuspunkte')->nullable();
                $table->date('provdatum')->nullable();
                $table->string('typ')->default('firma');
                $table->integer('autodruck_rz')->default(0);
                $table->integer('autodruck_periode')->default(1);
                $table->integer('autodruck_done')->default(0);
                $table->integer('autodruck_anzahlverband')->default(0);
                $table->integer('autodruck_anzahlkunde')->default(0);
                $table->integer('autodruck_mailverband')->default(0);
                $table->integer('autodruck_mailkunde')->default(0);
                $table->integer('dta_datei_verband')->default(0);
                $table->integer('dta_datei')->default(0);
                $table->boolean('deckungsbeitragcalc')->default(0);
                $table->decimal('deckungsbeitrag', 10, 2)->default(0.00);
                $table->decimal('umsatz_netto', 18, 2)->default(0.00);
                $table->decimal('erloes_netto', 18, 2)->default(0.00);
                $table->integer('vertriebid')->nullable()->index('vertriebid');
                $table->string('aktion', 64)->default('');
                $table->string('vertrieb')->default('');
                $table->decimal('provision', 10, 2)->nullable();
                $table->decimal('provision_summe', 10, 2)->nullable();
                $table->integer('gruppe')->default(0)->index('gruppe');
                $table->string('anschreiben')->nullable();
                $table->integer('usereditid')->nullable()->index('usereditid');
                $table->timestamp('useredittimestamp')->default('0000-00-00 00:00:00');
                $table->decimal('realrabatt', 10, 2)->nullable();
                $table->decimal('rabatt', 10, 2)->nullable();
                $table->date('einzugsdatum')->nullable();
                $table->decimal('rabatt1', 10, 2)->nullable();
                $table->decimal('rabatt2', 10, 2)->nullable();
                $table->decimal('rabatt3', 10, 2)->nullable();
                $table->decimal('rabatt4', 10, 2)->nullable();
                $table->decimal('rabatt5', 10, 2)->nullable();
                $table->boolean('mahnwesenfestsetzen')->default(0);
                $table->integer('lieferid')->default(0);
                $table->integer('ansprechpartnerid')->default(0);
                $table->text('systemfreitext');
                $table->integer('projektfiliale')->default(0);
                $table->integer('zuarchivieren')->default(0);
                $table->boolean('abweichendebezeichnung')->default(0);
                $table->dateTime('angelegtam')->nullable();
                $table->string('internebezeichnung')->default('');
                $table->date('bezahlt_am')->nullable();
                $table->string('sprache', 32)->default('');
                $table->text('bodyzusatz');
                $table->string('bundesland', 64)->default('');
                $table->integer('bearbeiterid')->nullable();
                $table->string('gln', 64)->default('');
                $table->text('lieferbedingung');
                $table->string('titel', 64)->default('');
                $table->string('deliverythresholdvatid', 64)->default('');
                $table->decimal('kurs', 18, 8)->default(0.00000000);
                $table->integer('ohne_artikeltext')->nullable();
                $table->boolean('anzeigesteuer')->default(0);
                $table->string('kostenstelle', 10)->default('');
                $table->decimal('skontobetrag', 14, 4)->nullable();
                $table->boolean('skontoberechnet')->default(0);
                $table->decimal('extsoll', 10, 2)->default(0.00);
                $table->boolean('teilstorno')->default(0);
                $table->string('bundesstaat', 32)->default('');
                $table->string('kundennummer_buchhaltung', 32)->default('');
                $table->string('storage_country', 3)->default('');
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
        Schema::dropIfExists('rechnung');
    }
}
