<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTblproductdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblproductdata', function (Blueprint $table) {
            $table->float('fProductStock', 15, 2);
            $table->float('fProductCost', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblproductdata', function (Blueprint $table) {
            $table->dropColumn('fProductStock');
            $table->dropColumn('fProductCost');
        });
    }
}
