<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTableAddImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {

            $table->string('image')->after('slug')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
