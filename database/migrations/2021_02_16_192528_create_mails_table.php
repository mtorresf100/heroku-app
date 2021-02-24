<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->text('to')->nullable()->comment('Direcciones de correo para enviar');
            $table->text('cc')->nullable()->comment('Direcciones de correo para copiar');
            $table->string('subject', 191)->nullable()->comment('Asunto del correo');
            $table->string('attachment', 191)->nullable()->comment('Archivo Adjunto');
            $table->text('body')->nullable()->comment('Cuerpo del correo');
            $table->string('status')->nullable()->comment('Estado 202 Indica que el correo se envió satisfactoriamente.');
            $table->text('response')->nullable()->comment('Respuesta de la API de SendGrid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
