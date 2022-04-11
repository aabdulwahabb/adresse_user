<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestellungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('bestellung', function (Blueprint $table) {
                $table->id();
                $table->date('datum');
                $table->string('projekt', 222)->index('projekt');
                $table->string('bestellungsart');
                $table->string('belegnr');
                $table->string('bearbeiter');
                $table->string('angebot');
                $table->text('freitext');
                $table->text('internebemerkung');
                $table->string('status')->index('status');
                $table->integer('adresse')->index('adresse');
                $table->string('name');
                $table->string('vorname');
                $table->string('abteilung');
                $table->string('unterabteilung');
                $table->string('strasse');
                $table->string('adresszusatz');
                $table->string('plz');
                $table->string('ort');
                $table->string('land');
                $table->integer('abweichendelieferadresse');
                $table->string('liefername');
                $table->string('lieferabteilung');
                $table->string('lieferunterabteilung');
                $table->string('lieferland');
                $table->string('lieferstrasse');
                $table->string('lieferort');
                $table->string('lieferplz');
                $table->string('lieferadresszusatz');
                $table->string('lieferansprechpartner');
                $table->string('ustid');
                $table->integer('ust_befreit');
                $table->string('email');
                $table->string('telefon');
                $table->string('telefax');
                $table->string('betreff');
                $table->string('kundennummer');
                $table->string('lieferantennummer');
                $table->string('versandart')->index('versandart');
                $table->date('lieferdatum');
                $table->string('einkaeufer');
                $table->integer('keineartikelnummern');
                $table->string('zahlungsweise');
                $table->string('zahlungsstatus');
                $table->integer('zahlungszieltage');
                $table->integer('zahlungszieltageskonto');
                $table->decimal('zahlungszielskonto', 10, 2);
                $table->decimal('gesamtsumme', 18, 4)->default(0.0000);
                $table->string('bank_inhaber');
                $table->string('bank_institut');
                $table->integer('bank_blz');
                $table->integer('bank_konto');
                $table->string('paypalaccount');
                $table->integer('bestellbestaetigung');
                $table->integer('firma');
                $table->integer('versendet');
                $table->dateTime('versendet_am');
                $table->string('versendet_per');
                $table->string('versendet_durch');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->integer('artikelnummerninfotext')->nullable();
                $table->string('ansprechpartner')->nullable();
                $table->integer('ohne_briefpapier')->nullable();
                $table->integer('schreibschutz')->default(0);
                $table->integer('pdfarchiviert')->default(0);
                $table->integer('pdfarchiviertversion')->default(0);
                $table->decimal('steuersatz_normal', 10, 2)->default(19.00);
                $table->decimal('steuersatz_zwischen', 10, 2)->default(7.00);
                $table->decimal('steuersatz_ermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_starkermaessigt', 10, 2)->default(7.00);
                $table->decimal('steuersatz_dienstleistung', 10, 2)->default(7.00);
                $table->string('waehrung')->default('EUR');
                $table->string('typ')->default('firma');
                $table->string('anschreiben')->nullable();
                $table->integer('usereditid')->nullable()->index('usereditid');
                $table->timestamp('useredittimestamp')->default('0000-00-00 00:00:00');
                $table->boolean('bestellungohnepreis')->default(0);
                $table->string('verbindlichkeiteninfo')->default('');
                $table->integer('projektfiliale')->default(0);
                $table->boolean('bestellung_bestaetigt')->default(0);
                $table->date('bestaetigteslieferdatum')->nullable();
                $table->string('bestellungbestaetigtper', 64)->default('');
                $table->string('bestellungbestaetigtabnummer', 64)->default('');
                $table->date('gewuenschteslieferdatum')->nullable();
                $table->integer('zuarchivieren')->default(0);
                $table->dateTime('angelegtam')->nullable();
                $table->string('internebezeichnung')->default('');
                $table->integer('preisanfrageid')->default(0);
                $table->string('sprache', 32)->default('');
                $table->text('bodyzusatz');
                $table->string('kundennummerlieferant', 64)->default('');
                $table->text('lieferbedingung');
                $table->string('titel', 64)->default('');
                $table->string('liefertitel', 64)->default('');
                $table->string('lieferbundesland', 70)->nullable();
                $table->string('bundesland')->nullable();
                $table->integer('ohne_artikeltext')->nullable();
                $table->boolean('langeartikelnummern')->default(0);
                $table->boolean('abweichendebezeichnung')->default(0);
                $table->boolean('anzeigesteuer')->default(0);
                $table->string('kostenstelle', 10)->default('');
                $table->decimal('skontobetrag', 14, 4)->nullable();
                $table->boolean('skontoberechnet')->default(0);
                $table->string('bundesstaat', 32)->default('');
                $table->string('lieferbundesstaat', 32)->default('');
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
            Schema::dropIfExists('bestellung');
        }
    }
}
