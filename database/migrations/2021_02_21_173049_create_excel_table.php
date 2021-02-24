<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel', function (Blueprint $table) {
            $table->id();
            $table->string('airbill_number', 191)->nullable();
            $table->string('invoice_number', 191)->nullable();
            $table->unsignedBigInteger('invoice_age')->nullable();
            $table->string('airbill_type', 191)->nullable();
            $table->string('airbill_original_amount_usd', 191)->nullable();
            $table->string('rebilling_account', 191)->nullable();
            $table->date('cash_date')->nullable();
            $table->date('ship_date')->nullable();
            $table->string('woff_location', 4)->nullable();
            $table->text('comments')->nullable();
            $table->string('legal_entity_code', 3)->nullable();
            $table->text('email_pup_pod_agent')->nullable();
            $table->text('email_manager_collector')->nullable();
            $table->string('pending_category', 191)->nullable();
            $table->string('agent', 191)->nullable();
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
        Schema::dropIfExists('excel');
    }
}
