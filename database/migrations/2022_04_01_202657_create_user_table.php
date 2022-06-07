<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      if (!app()->environment('production')) {
             Schema::create('user', function (Blueprint $table) {
               $table->id();
               $table->string('username',100)->nullable()->unique();
               $table->string('password')->nullable();
               $table->integer('activ')->nullable()->default(0);
               $table->string('type',100)->nullable()->default('');
               $table->integer('adresse')->index('adresse');
               $table->boolean('callcenter_notification')->default('1');
               $table->boolean('chat_popup')->default('1');
               $table->string('defaultcolor',10)->default('');
               $table->string('description')->nullable();
               $table->boolean('docscan_aktiv')->default(0);
               $table->string('docscan_passwort',64)->nullable();
               $table->boolean('email_bevorzugen')->default('1');
               $table->integer('externlogin')->nullable();
               $table->integer('fehllogins')->default(0);
               $table->integer('firma');
               $table->integer('gpsstechuhr')->nullable();
               $table->integer('hwcounter')->nullable();
               $table->string('hwdatablock')->nullable();
               $table->string('hwkey')->nullable();
               $table->integer('hwtoken')->nullable();
               $table->string('internebezeichnung')->nullable();
               $table->integer('kalender_aktiv')->nullable();
               $table->integer('kalender_ausblenden')->default(0);
               $table->string('kalender_passwort')->nullable();
               $table->timestamp('logdatei');
               $table->string('motppin')->nullable();
               $table->string('motpsecret')->nullable();
               $table->integer('paketmarkendrucker')->default(0);
               $table->integer('parentuser')->nullable()->default(0);
               $table->string('passwordhash',60)->nullable();
               $table->string('passwordmd5')->nullable();
               $table->string('passwordsha512',128)->default('');
               $table->integer('projekt')->default(0);
               $table->boolean('projekt_bevorzugen')->default(0);
               $table->string('remember_token',100)->nullable();
               $table->integer('repassword');
               $table->string('rfidtag',64)->default('');
               $table->string('salt',128)->default('');
               $table->text('settings');
               $table->string('sprachebevorzugen')->nullable();
               $table->integer('standarddrucker');
               $table->integer('standardetikett')->default(0);
               $table->integer('standardfax')->default(0);
               $table->integer('standardversanddrucker')->default(0);
               $table->string('startseite',1024)->nullable();
               $table->string('stechuhrdevice')->default('');
               $table->string('vergessencode')->default('');
               $table->date('vergessenzeit')->nullable();
               $table->string('vorlage')->nullable();
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
             Schema::dropIfExists('user');
     }
   }
 }
