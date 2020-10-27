<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pharmacy_id')->nullable();
            $table->integer('pharmacy_branch_id')->nullable();
            $table->string('coupon_code');
            $table->dateTime('apply_date')->nullable();
            $table->enum('coupon_type', ['1MONTH', '3MONTH', '6MONTH', '1YEAR'])->default('1MONTH');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'USED'])->default('ACTIVE');
            $table->string('generated_by')->nullable();
            $table->string('activated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
