<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetoureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('retoure', function (Blueprint $table) {
                $table->id();
                $table->date('datum');
                $table->string('projekt');
                $table->string('belegnr');
                $table->string('name');
                $table->string('strasse');
                $table->string('plz');
                $table->string('ort');
                $table->string('land');
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
            Schema::dropIfExists('retoure');
        }
    }
}
