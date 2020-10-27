<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->dateTime('pay_date');
            $table->enum('payment_for', ['Feature Development', 'Report', 'Monthly Bill', 'Others'])->default('Monthly Bill');
            $table->enum('payment_type', ['Partial', 'Full'])->default('Full');
            $table->string('month')->nullable();
            $table->enum('payment_by', ['Cash', 'Cheque', 'bKash', 'Bank'])->default('Cash');
            $table->unsignedBigInteger('collected_by')->nullable();
            $table->float('amount');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

        Schema::table('monthly_bills', function(Blueprint $table){
            $table->foreign('collected_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pharmacy_id')->references('id')->on('smart_pharmacies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_bills');
    }
}
