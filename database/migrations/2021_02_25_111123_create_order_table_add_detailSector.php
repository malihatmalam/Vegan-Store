<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTableAddDetailSector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('detailSector_name')->after('sector_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('detailSector_name');
        });
    }
}
