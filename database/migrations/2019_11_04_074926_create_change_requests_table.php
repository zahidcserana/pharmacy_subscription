<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->string('feature');
            $table->longText('details');
            $table->enum('payment_type', ['FREE', 'FULLY-PAID', 'PARTIAL-PAID'])->default('FREE');
            $table->enum('status', ['Pending', 'Ongoing', 'Done'])->default('Pending');
            $table->unsignedBigInteger('collected_by')->nullable();
            $table->timestamps();
        });

        Schema::table('change_requests', function(Blueprint $table){
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
        Schema::dropIfExists('change_requests');
    }
}
