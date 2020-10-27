<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidityPeriodToSmartPharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('smart_pharmacies', function (Blueprint $table) {
            $table->integer('validity')->default(0);
            $table->integer('use_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('smart_pharmacies', function (Blueprint $table) {
            $table->dropColumn('validity');
            $table->dropColumn('use_count');
        });
    }
}
