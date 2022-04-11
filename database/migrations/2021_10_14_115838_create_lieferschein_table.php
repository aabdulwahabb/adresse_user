<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieferscheinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lieferschein', function (Blueprint $table) {
                $table->id();
                $table->date('datum');
                $table->integer('projekt')->index('projekt');
                $table->string('lieferscheinart');
                $table->string('belegnr')->index('belegnr');
                $table->string('bearbeiter');
                $table->string('auftrag');
                $table->integer('auftragid')->index('auftragid');
                $table->text('freitext');
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
                $table->string('land')->index('land');
                $table->string('ustid');
                $table->string('email');
                $table->string('telefon');
                $table->string('telefax');
                $table->string('betreff');
                $table->string('kundennummer', 64)->nullable();
                $table->string('versandart')->index('versandart');
                $table->string('versand');
                $table->integer('firma');
                $table->integer('versendet');
                $table->dateTime('versendet_am');
                $table->string('versendet_per');
                $table->string('versendet_durch');
                $table->integer('inbearbeitung_user');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->integer('ohne_briefpapier')->nullable();
                $table->integer('schreibschutz')->default(0);
                $table->integer('pdfarchiviert')->default(0);
                $table->integer('pdfarchiviertversion')->default(0);
                $table->integer('ust_befreit');
                $table->string('ihrebestellnummer')->nullable();
                $table->text('internebemerkung')->nullable();
                $table->string('typ')->default('firma');
                $table->integer('vertriebid')->nullable()->index('vertriebid');
                $table->string('vertrieb')->default('');
                $table->string('anschreiben')->nullable();
                $table->integer('usereditid')->nullable()->index('usereditid');
                $table->timestamp('useredittimestamp')->default('0000-00-00 00:00:00');
                $table->boolean('lieferantenretoure')->default(0);
                $table->text('lieferantenretoureinfo');
                $table->integer('lieferant')->default(0);
                $table->integer('lieferid')->default(0);
                $table->integer('ansprechpartnerid')->default(0);
                $table->integer('projektfiliale')->default(0);
                $table->boolean('projektfiliale_eingelagert')->default(0);
                $table->integer('zuarchivieren')->default(0);
                $table->dateTime('angelegtam')->nullable();
                $table->string('internebezeichnung')->default('');
                $table->integer('kommissionierung')->default(0)->index('kommissionierung');
                $table->string('sprache', 32)->default('');
                $table->text('bodyzusatz');
                $table->string('bundesland', 64)->default('');
                $table->integer('bearbeiterid')->nullable();
                $table->string('gln', 64)->default('');
                $table->text('lieferbedingung');
                $table->string('titel', 64)->default('');
                $table->integer('standardlager')->default(0);
                $table->integer('vmfastlane')->nullable()->default(0);
                $table->boolean('engraved')->nullable()->default(0)->index('engraved');
                $table->dateTime('engraving_timestamp')->nullable()->useCurrent();
                $table->integer('engraved_userid')->nullable()->default(0);
                $table->integer('rechnungid')->default(0)->index('lieferschein_rechnungid');
                $table->boolean('keinerechnung')->default(0)->index('keinerechnung');
                $table->integer('ohne_artikeltext')->nullable();
                $table->boolean('abweichendebezeichnung')->default(0);
                $table->string('kostenstelle', 10)->default('');
                $table->integer('kommissionskonsignationslager')->default(0);
                $table->string('bundesstaat', 32)->default('');
                $table->integer('teillieferungvon')->default(0);
                $table->integer('teillieferungnummer')->default(0);
                $table->integer('kiste')->default(-1);
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
        Schema::dropIfExists('lieferschein');
    }
}
