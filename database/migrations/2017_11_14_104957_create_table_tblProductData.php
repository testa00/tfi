<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTblProductData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblProductData', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('intProductDataId');
            $table->string('strProductName', 50);
            $table->string('strProductDesc', 255);
            $table->string('strProductCode', 10)->unique();
            $table->dateTime('dtmAdded')->nullable();
            $table->dateTime('dtmDiscontinued')->nullable();
            $table->timestamp('stmTimestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblProductData');
    }
}
