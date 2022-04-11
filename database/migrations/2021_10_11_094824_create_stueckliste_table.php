<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuecklisteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!app()->environment('production')) {
            Schema::create('stueckliste', function (Blueprint $table) {
                $table->id();
                $table->integer('sort');
                $table->integer('artikel');
                $table->text('referenz');
                $table->string('place', 255);
                $table->string('layer', 255);
                $table->integer('stuecklistevonartikel');
                $table->decimal('menge', 14,4)->default(0.0000);
                $table->integer('firma');
                $table->text('wert');
                $table->text('bauform');
                $table->integer('alternative')->default(0);
                $table->string('zachse', 64);
                $table->string('xpos', 64);
                $table->string('ypos', 64);
                $table->string('art', 64);
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
            Schema::dropIfExists('stueckliste');
        }
    }
}
