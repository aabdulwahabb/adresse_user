<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieferscheinPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('lieferschein_position', function (Blueprint $table) {
                $table->id();
                $table->integer('lieferschein')->index('lieferschein');
                $table->integer('artikel')->index('artikel');
                $table->integer('projekt');
                $table->string('bezeichnung');
                $table->text('beschreibung');
                $table->text('internerkommentar');
                $table->string('nummer');
                $table->string('seriennummer');
                $table->decimal('menge', 14, 4);
                $table->date('lieferdatum');
                $table->string('vpe');
                $table->integer('sort');
                $table->string('status');
                $table->text('bemerkung');
                $table->decimal('geliefert', 14, 4);
                $table->integer('abgerechnet');
                $table->timestamp('logdatei')->useCurrent()->useCurrentOnUpdate();
                $table->string('einheit')->default('');
                $table->integer('explodiert_parent_artikel')->default(0);
                $table->string('zolltarifnummer', 128)->default('0');
                $table->string('herkunftsland', 128)->default('0');
                $table->string('artikelnummerkunde', 128)->default('');
                $table->boolean('lieferdatumkw')->default(0);
                $table->integer('auftrag_position_id')->default(0)->index('auftrag_position_id');
                $table->string('lagertext')->default('');
                $table->boolean('kostenlos')->default(0);
                $table->integer('explodiert_parent')->default(0)->index('explodiert_parent');
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
                $table->integer('gravursoll')->nullable()->default(0);
                $table->integer('gravursist')->nullable()->default(0);
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
                $table->decimal('zolleinzelwert', 18, 8)->default(0.00000000);
                $table->decimal('zollgesamtwert', 18, 8)->default(0.00000000);
                $table->string('zollwaehrung', 3)->default('');
                $table->decimal('zolleinzelgewicht', 18, 8)->default(0.00000000);
                $table->decimal('zollgesamtgewicht', 18, 8)->default(0.00000000);
                $table->string('nve')->default('');
                $table->string('packstueck')->default('');
                $table->decimal('vpemenge', 14, 4)->default(0.0000);
                $table->decimal('einzelstueckmenge', 14, 4)->default(0.0000);
                $table->boolean('ausblenden_im_pdf')->nullable()->default(0);
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
        Schema::dropIfExists('lieferschein_position');
    }
}
