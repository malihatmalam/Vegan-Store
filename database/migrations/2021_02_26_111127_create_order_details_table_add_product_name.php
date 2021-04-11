<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTableAddProductName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {

            $table->string('product_name')->after('product_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('product_name');
        });
    }
}
