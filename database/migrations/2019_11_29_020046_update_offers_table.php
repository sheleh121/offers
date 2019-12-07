<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->string('number')->nullable();
            $table->integer('productionTime')->nullable();
            $table->integer('language')->nullable();
            $table->integer('sale')->default(0);
            $table->bigInteger('termsOfPayment')->nullable()->unsigned();
            $table->foreign('termsOfPayment')->references('id')->on('termsOfPayments');
            $table->bigInteger('employee')->nullable()->unsigned();
            $table->foreign('employee')->on('employees')->references('id');
            $table->integer('totalCost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
