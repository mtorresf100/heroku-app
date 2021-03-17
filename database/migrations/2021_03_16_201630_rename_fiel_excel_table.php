<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFielExcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excel', function (Blueprint $table) {
            $table->renameColumn('pup_pop_agent', 'pup_pod_agent');
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
            $table->renameColumn('pup_pod_agent', 'pup_pop_agent');
        });
    }
}
