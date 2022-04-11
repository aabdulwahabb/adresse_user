<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZolltarifnummerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('zolltarifnummer', function (Blueprint $table) {
                $table->id();
                $table->string('nummer', 255)->index();
                $table->string('beschreibung', 512);
                $table->text('internebemerkung');
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
            Schema::dropIfExists('zolltarifnummer');
        }
    }
}
