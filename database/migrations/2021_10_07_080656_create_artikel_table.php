<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('artikel', function (Blueprint $table) {
                $table->id();
                $table->string('typ');
                $table->string('nummer')->index('nummer');
                $table->text('checksum');
                $table->integer('projekt')->index('projekt');
                $table->string('inaktiv');
                $table->integer('ausverkauft');
                $table->string('warengruppe');
                $table->string('name_de');
                $table->string('name_en');
                $table->text('kurztext_de');
                $table->text('kurztext_en');
                $table->text('beschreibung_de');
                $table->text('beschreibung_en');
                $table->text('uebersicht_de');
                $table->text('uebersicht_en');
                $table->text('links_de');
                $table->text('links_en');
                $table->text('startseite_de');
                $table->text('startseite_en');
                $table->string('standardbild');
                $table->string('herstellerlink');
                $table->string('hersteller');
                $table->string('teilbar');
                $table->string('nteile');
                $table->string('seriennummern');
                $table->string('lager_platz');
                $table->string('lieferzeit');
                $table->string('lieferzeitmanuell');
                $table->text('sonstiges');
                $table->string('gewicht');
                $table->string('endmontage');
                $table->string('funktionstest');
                $table->string('artikelcheckliste');
                $table->integer('stueckliste');
                $table->integer('juststueckliste');
                $table->string('barcode', 7);
                $table->string('hinzugefuegt');
                $table->string('pcbdecal');
                $table->integer('lagerartikel');
                $table->integer('porto')->index('porto');
                $table->integer('chargenverwaltung');
                $table->integer('provisionsartikel');
                $table->integer('gesperrt');
                $table->string('sperrgrund');
                $table->integer('geloescht')->index('geloescht');
                $table->date('gueltigbis');
                $table->string('umsatzsteuer');
                $table->string('klasse');
                $table->integer('adresse');
                $table->integer('shopartikel');
                $table->integer('unishopartikel');
                $table->integer('journalshopartikel');
                $table->integer('shop');
                $table->integer('katalog');
                $table->text('katalogtext_de');
                $table->text('katalogtext_en');
                $table->string('katalogbezeichnung_de');
                $table->string('katalogbezeichnung_en');
                $table->integer('neu');
                $table->integer('topseller');
                $table->integer('startseite');
                $table->integer('wichtig');
                $table->integer('mindestlager');
                $table->integer('mindestbestellung');
                $table->integer('partnerprogramm_sperre');
                $table->text('internerkommentar');
                $table->integer('intern_gesperrt');
                $table->integer('intern_gesperrtuser');
                $table->text('intern_gesperrtgrund');
                $table->integer('inbearbeitung');
                $table->integer('inbearbeitunguser');
                $table->integer('cache_lagerplatzinhaltmenge');
                $table->text('internkommentar');
                $table->integer('firma');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->text('anabregs_text')->nullable();
                $table->integer('autobestellung')->default(0);
                $table->integer('produktion')->nullable();
                $table->string('herstellernummer')->nullable()->index('herstellernummer');
                $table->integer('restmenge')->nullable();
                $table->string('lieferzeitmanuell_en')->nullable();
                $table->integer('variante')->nullable();
                $table->integer('variante_von')->nullable()->index('variante_von');
                $table->text('produktioninfo')->nullable();
                $table->text('sonderaktion')->nullable();
                $table->text('sonderaktion_en')->nullable();
                $table->integer('autolagerlampe')->default(0);
                $table->text('freifeld1');
                $table->text('freifeld2');
                $table->text('freifeld3');
                $table->text('freifeld4');
                $table->text('freifeld5');
                $table->text('freifeld6');
                $table->integer('nachbestellt')->nullable();
                $table->integer('keinepunkte')->nullable();
                $table->decimal('punkte', 10, 2);
                $table->decimal('bonuspunkte', 10, 2);
                $table->string('ean', 1024)->default('')->index('ean');
                $table->string('einheit')->default('');
                $table->integer('keineprovision')->nullable();
                $table->integer('shop2')->nullable();
                $table->integer('shop3')->nullable();
                $table->integer('autoabgleicherlaubt')->default(0);
                $table->decimal('pseudopreis', 10, 2)->nullable();
                $table->integer('freigabenotwendig')->default(0);
                $table->string('freigaberegel')->default('');
                $table->decimal('mlmdirektpraemie', 10, 2)->nullable();
                $table->decimal('mlmpunkte', 10, 2);
                $table->decimal('mlmbonuspunkte', 10, 2);
                $table->integer('mlmkeinepunkteeigenkauf')->nullable();
                $table->integer('mindesthaltbarkeitsdatum')->default(0);
                $table->boolean('keineeinzelartikelanzeigen')->default(0);
                $table->boolean('keineeinzelartikelanzeigenre')->default(0);
                $table->integer('individualartikel')->default(0);
                $table->integer('keinrabatterlaubt')->nullable();
                $table->integer('rabatt')->default(0)->index('rabatt');
                $table->decimal('rabatt_prozent', 10, 2)->nullable();
                $table->boolean('geraet')->default(0);
                $table->boolean('serviceartikel')->default(0);
                $table->integer('usereditid')->nullable()->index('usereditid');
                $table->timestamp('useredittimestamp')->default('0000-00-00 00:00:00');
                $table->string('webid', 1024);
                $table->string('letzteseriennummer')->default('');
                $table->decimal('laenge', 10, 2)->default(0.00);
                $table->decimal('breite', 10, 2)->default(0.00);
                $table->decimal('hoehe', 10, 2)->default(0.00);
                $table->text('anabregs_text_en');
                $table->string('pseudolager', 10)->default('');
                $table->boolean('gebuehr')->default(0);
                $table->string('leerfeld', 64)->nullable();
                $table->string('zolltarifnummer', 64)->default('')->index('zolltarifnummer');
                $table->string('herkunftsland', 64)->default('');
                $table->boolean('downloadartikel')->default(0);
                $table->tinyInteger('matrixprodukt');
                $table->string('steuer_erloese_inland_normal', 10)->default('');
                $table->string('steuer_aufwendung_inland_normal', 10)->default('');
                $table->string('steuer_erloese_inland_ermaessigt', 10)->default('');
                $table->string('steuer_aufwendung_inland_ermaessigt', 10)->default('');
                $table->string('steuer_erloese_inland_steuerfrei', 10)->default('');
                $table->string('steuer_aufwendung_inland_steuerfrei', 10)->default('');
                $table->string('steuer_erloese_inland_innergemeinschaftlich', 10)->default('');
                $table->string('steuer_aufwendung_inland_innergemeinschaftlich', 10)->default('');
                $table->string('steuer_erloese_inland_eunormal', 10)->default('');
                $table->string('steuer_erloese_inland_nichtsteuerbar', 10)->default('');
                $table->string('steuer_erloese_inland_euermaessigt', 10)->default('');
                $table->string('steuer_aufwendung_inland_nichtsteuerbar', 10)->default('');
                $table->string('steuer_aufwendung_inland_eunormal', 10)->default('');
                $table->string('steuer_aufwendung_inland_euermaessigt', 10)->default('');
                $table->string('steuer_erloese_inland_export', 10)->default('');
                $table->string('steuer_aufwendung_inland_import', 10)->default('');
                $table->integer('steuer_art_produkt')->default(1);
                $table->integer('steuer_art_produkt_download')->default(1);
                $table->text('metadescription_de');
                $table->text('metadescription_en');
                $table->text('metakeywords_de');
                $table->text('metakeywords_en');
                $table->boolean('generierenummerbeioption')->default(0);
                $table->boolean('allelieferanten')->default(0);
                $table->string('bildvorschau', 64)->default('');
                $table->integer('inventursperre')->default(0);
                $table->boolean('variante_kopie')->default(0);
                $table->boolean('unikat')->default(0);
                $table->boolean('externeproduktion')->default(0);
                $table->text('freifeld7');
                $table->text('freifeld8');
                $table->text('freifeld9');
                $table->text('freifeld10');
                $table->string('ursprungsregion')->default('');
                $table->boolean('tagespreise')->default(0);
                $table->boolean('rohstoffe')->default(0);
                $table->boolean('vkmeldungunterdruecken')->default(0);
                $table->integer('provisionssperre')->nullable();
                $table->integer('inventurekaktiv')->default(0);
                $table->decimal('inventurek', 18, 8)->nullable();
                $table->string('altersfreigabe', 3)->default('');
                $table->boolean('dienstleistung')->default(0)->index('dienstleistung');
                $table->text('hinweis_einfuegen');
                $table->string('steuertext_innergemeinschaftlich', 1024)->nullable();
                $table->string('steuertext_export', 1024)->nullable();
                $table->text('freifeld11');
                $table->text('freifeld12');
                $table->text('freifeld13');
                $table->text('freifeld14');
                $table->text('freifeld15');
                $table->text('freifeld16');
                $table->text('freifeld17');
                $table->text('freifeld18');
                $table->text('freifeld19');
                $table->text('freifeld20');
                $table->text('metatitle_de');
                $table->text('metatitle_en');
                $table->integer('vmabrechnungsartikel')->default(0);
                $table->integer('lagerkategorie')->index('lagerkategorie');
                $table->boolean('has_preproduced_partlist')->nullable()->default(0);
                $table->integer('preproduced_partlist')->nullable()->default(0);
                $table->decimal('xvp', 14, 2)->default(0.00);
                $table->boolean('ohnepreisimpdf')->default(0);
                $table->integer('etikettautodruck')->default(0);
                $table->integer('lagerkorrekturwert')->default(0);
                $table->integer('autodrucketikett')->default(0);
                $table->string('abckategorie', 1)->default('');
                $table->decimal('steuersatz', 5, 2)->nullable();
                $table->string('formelmenge')->default('');
                $table->string('formelpreis')->default('');
                $table->text('freifeld21');
                $table->text('freifeld22');
                $table->text('freifeld23');
                $table->text('freifeld24');
                $table->text('freifeld25');
                $table->text('freifeld26');
                $table->text('freifeld27');
                $table->text('freifeld28');
                $table->text('freifeld29');
                $table->text('freifeld30');
                $table->text('freifeld31');
                $table->text('freifeld32');
                $table->text('freifeld33');
                $table->text('freifeld34');
                $table->text('freifeld35');
                $table->text('freifeld36');
                $table->text('freifeld37');
                $table->text('freifeld38');
                $table->text('freifeld39');
                $table->text('freifeld40');
                $table->integer('bestandalternativartikel')->default(0);
                $table->boolean('unikatbeikopie')->default(0);
                $table->integer('steuergruppe')->default(0);
                $table->string('kostenstelle', 10)->default('');
                $table->integer('artikelautokalkulation')->default(0);
                $table->integer('artikelabschliessenkalkulation')->default(0);
                $table->integer('artikelfifokalkulation')->default(0);
                $table->boolean('keinskonto')->default(0);
                $table->decimal('berechneterek', 14, 4)->default(0.0000);
                $table->boolean('verwendeberechneterek')->default(0);
                $table->string('berechneterekwaehrung', 16)->default('');
                $table->timestamp('laststorage_changed')->nullable()->default('1970-01-02 00:00:00')->index('laststorage_changed');
                $table->timestamp('laststorage_sync')->nullable()->default('1970-01-02 00:00:00')->index('laststorage_sync');
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
            Schema::dropIfExists('artikel');
        }
    }
}
