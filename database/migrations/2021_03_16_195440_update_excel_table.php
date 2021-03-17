<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excel', function (Blueprint $table) {
            $table->string('pup_pop_agent', 191)
                ->after('agent')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('excel', function (Blueprint $table) {
            $table->dropColumn('pup_pop_agent');
        });
    }
}
