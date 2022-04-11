<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuftragTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('auftrag', function (Blueprint $table) {

                \Illuminate\Database\Schema\Builder::defaultStringLength(100);


                $table->id();
                $table->date('datum')->index('datum');
                $table->string('art')->nullable();
                $table->string('projekt', 222)->index('projekt');
                $table->string('belegnr')->index('belegnr')->nullable();
                $table->string('internet')->index('internet')->nullable();
                $table->string('bearbeiter')->nullable();
                $table->string('angebot')->nullable();
                $table->text('freitext')->nullable();
                $table->text('internebemerkung')->nullable();
                $table->string('status')->index('status')->nullable();
                $table->integer('adresse')->index('adresse')->nullable();
                $table->string('name')->nullable();
                $table->string('abteilung')->nullable();
                $table->string('unterabteilung')->nullable();
                $table->string('strasse')->nullable();
                $table->string('adresszusatz')->nullable();
                $table->string('ansprechpartner')->nullable();
                $table->string('plz')->nullable();
                $table->string('ort')->nullable();
                $table->string('land')->nullable();
                $table->string('ustid')->nullable();
                $table->integer('ust_befreit')->nullable();
                $table->integer('ust_inner')->nullable();
                $table->string('email')->nullable();
                $table->string('telefon')->nullable();
                $table->string('telefax')->nullable();
                $table->string('betreff')->nullable();
                $table->string('kundennummer', 64)->nullable();
                $table->string('versandart')->index('versandart')->nullable();
                $table->string('vertrieb')->nullable();
                $table->string('zahlungsweise')->index('zahlungsweise')->nullable();
                $table->integer('zahlungszieltage')->nullable();
                $table->integer('zahlungszieltageskonto')->nullable();
                $table->decimal('zahlungszielskonto', 10, 2);
                $table->string('bank_inhaber')->nullable();
                $table->string('bank_institut')->nullable();
                $table->string('bank_blz')->nullable();
                $table->string('bank_konto')->nullable();
                $table->string('kreditkarte_typ')->nullable();
                $table->string('kreditkarte_inhaber')->nullable();
                $table->string('kreditkarte_nummer')->nullable();
                $table->string('kreditkarte_pruefnummer')->nullable();
                $table->string('kreditkarte_monat')->nullable();
                $table->string('kreditkarte_jahr')->nullable();
                $table->integer('firma')->nullable();
                $table->integer('versendet')->nullable();
                $table->dateTime('versendet_am')->nullable();
                $table->string('versendet_per')->nullable();
                $table->string('versendet_durch')->nullable();
                $table->integer('autoversand')->nullable();
                $table->integer('keinporto')->nullable();
                $table->integer('keinestornomail')->nullable();
                $table->integer('abweichendelieferadresse')->nullable();
                $table->string('liefername')->nullable();
                $table->string('lieferabteilung')->nullable();
                $table->string('lieferunterabteilung')->nullable();
                $table->string('lieferland')->nullable();
                $table->string('lieferstrasse')->nullable();
                $table->string('lieferort')->nullable();
                $table->string('lieferplz')->nullable();
                $table->string('lieferadresszusatz')->nullable();
                $table->string('lieferansprechpartner')->nullable();
                $table->string('packstation_inhaber')->nullable();
                $table->string('packstation_station')->nullable();
                $table->string('packstation_ident')->nullable();
                $table->string('packstation_plz')->nullable();
                $table->string('packstation_ort')->nullable();
                $table->integer('autofreigabe')->nullable();
                $table->integer('freigabe')->nullable();
                $table->integer('nachbesserung')->nullable();
                $table->decimal('gesamtsumme', 18, 2)->default(0.00);
                $table->integer('inbearbeitung')->nullable();
                $table->integer('abgeschlossen')->nullable();
                $table->integer('nachlieferung')->nullable();
                $table->integer('lager_ok')->nullable();
                $table->integer('porto_ok')->nullable();
                $table->integer('ust_ok')->nullable();
                $table->integer('check_ok')->nullable();
                $table->integer('vorkasse_ok')->nullable();
                $table->integer('nachnahme_ok')->nullable();
                $table->integer('reserviert_ok')->nullable();
                $table->integer('partnerid')->nullable();
                $table->date('folgebestaetigung')->nullable();
                $table->date('zahlungsmail')->nullable();
                $table->string('stornogrund')->nullable();
                $table->string('stornosonstiges')->nullable();
                $table->string('stornorueckzahlung')->nullable();
                $table->decimal('stornobetrag', 18, 2)->default(0.00);
                $table->string('stornobankinhaber')->nullable();
                $table->string('stornobankkonto')->nullable();
                $table->string('stornobankblz')->nullable();
                $table->string('stornobankbank')->nullable();
                $table->integer('stornogutschrift')->nullable();
                $table->string('stornogutschriftbeleg')->nullable();
                $table->integer('stornowareerhalten')->nullable();
                $table->string('stornomanuellebearbeitung')->nullable();
                $table->text('stornokommentar')->nullable();
                $table->string('stornobezahlt')->nullable();
                $table->date('stornobezahltam')->nullable();
                $table->string('stornobezahltvon')->nullable();
                $table->integer('stornoabgeschlossen')->nullable();
                $table->string('stornorueckzahlungper')->nullable();
                $table->integer('stornowareerhaltenretour')->nullable();
                $table->integer('partnerausgezahlt')->nullable();
                $table->date('partnerausgezahltam')->nullable();
                $table->string('kennen')->nullable();
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->integer('keinetrackingmail')->nullable();
                $table->integer('zahlungsmailcounter')->nullable();
                $table->integer('keinsteuersatz')->nullable();
                $table->integer('angebotid')->nullable();
                $table->integer('ohne_briefpapier')->nullable();
                $table->integer('schreibschutz')->default(0);
                $table->integer('pdfarchiviert')->default(0);
                $table->integer('pdfarchiviertversion')->default(0);
                $table->string('ihrebestellnummer')->nullable();
                $table->decimal('steuersatz_normal', 10, 2)->default(19.00);
                $table->decimal('steuersatz_zwischen', 10, 2)->default(7.00);
                $table->decimal('steuersatz_ermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_starkermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_dienstleistung', 10, 2)->default(7.00);
                $table->string('waehrung')->default('EUR')->nullable();
                $table->integer('anfrageid')->default(0);
                $table->integer('shop')->default(0);
                $table->string('typ')->default('firma');
                $table->string('shopextid', 1024)->default('')->index('shopextid');
                $table->string('shopextstatus', 1024)->default('');
                $table->integer('rma')->default(0);
                $table->boolean('deckungsbeitragcalc')->default(0);
                $table->decimal('deckungsbeitrag', 10, 2)->default(0.00);
                $table->decimal('erloes_netto', 10, 2)->default(0.00);
                $table->decimal('umsatz_netto', 10, 2)->default(0.00);
                $table->date('lieferdatum')->nullable();
                $table->date('tatsaechlicheslieferdatum')->nullable();
                $table->integer('liefertermin_ok')->default(1);
                $table->integer('teillieferung_moeglich')->default(0);
                $table->integer('kreditlimit_ok')->default(1);
                $table->integer('kreditlimit_freigabe')->default(0);
                $table->integer('liefersperre_ok')->default(1);
                $table->integer('teillieferungvon')->default(0)->index('teillieferungvon');
                $table->integer('teillieferungnummer')->default(0);
                $table->integer('vertriebid')->nullable()->index('vertriebid');
                $table->string('aktion', 64)->default('');
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
                $table->integer('vorabbezahltmarkieren')->default(0);
                $table->string('transaktionsnummer')->default('');
                $table->integer('lieferid')->default(0);
                $table->integer('ansprechpartnerid')->default(0);
                $table->text('systemfreitext');
                $table->string('auftragseingangper', 64)->default('');
                $table->integer('projektfiliale')->default(0);
                $table->boolean('lieferdatumkw')->default(0);
                $table->integer('zuarchivieren')->default(0);
                $table->boolean('abweichendebezeichnung')->default(0);
                $table->dateTime('angelegtam')->nullable();
                $table->string('internebezeichnung')->default('');
                $table->decimal('saldo', 10, 2)->default(0.00);
                $table->dateTime('saldogeprueft')->nullable();
                $table->integer('lieferungtrotzsperre')->default(0);
                $table->tinyInteger('tcauftragwichtig');
                $table->boolean('rabatteportofestschreiben')->default(0);
                $table->boolean('lieferantenauftrag')->default(0);
                $table->integer('lieferant')->default(0);
                $table->string('sprache', 32)->default('');
                $table->text('bodyzusatz');
                $table->string('bundesland', 64)->default('');
                $table->integer('bearbeiterid')->nullable();
                $table->string('gln', 64)->default('');
                $table->string('liefergln', 64)->default('');
                $table->integer('cronjobkommissionierung')->default(0);
                $table->text('lieferbedingung');
                $table->string('titel', 64)->default('');
                $table->string('liefertitel', 64)->default('');
                $table->integer('standardlager')->default(0);
                $table->string('lieferbundesland', 70)->nullable();
                $table->integer('vmfastlane')->nullable()->default(0);
                $table->dateTime('init_timestamp')->useCurrent();
                $table->boolean('vmversandbereit')->default(0);
                $table->dateTime('vmversandbereit_timestamp')->nullable();
                $table->string('lieferemail', 200)->default('');
                $table->integer('rechnungid')->default(0);
                $table->string('deliverythresholdvatid', 64)->default('');
                $table->boolean('fastlane')->nullable()->default(0);
                $table->decimal('kurs', 18, 8)->default(0.00000000);
                $table->string('lieferantennummer')->default('');
                $table->string('lieferantkdrnummer')->default('')->index('lieferantkdrnummer');
                $table->integer('ohne_artikeltext')->nullable();
                $table->integer('webid')->nullable();
                $table->boolean('anzeigesteuer')->default(0);
                $table->string('kostenstelle', 10)->default('');
                $table->decimal('skontobetrag', 14, 4)->nullable();
                $table->boolean('skontoberechnet')->default(0);
                $table->integer('kommissionskonsignationslager')->default(0);
                $table->decimal('extsoll', 10, 2)->default(0.00);
                $table->string('bundesstaat', 32)->default('');
                $table->string('lieferbundesstaat', 32)->default('');
                $table->date('reservationdate')->nullable();
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
        if (!app()->environment('production')) {
            Schema::dropIfExists('auftrag');
        }
    }
}
