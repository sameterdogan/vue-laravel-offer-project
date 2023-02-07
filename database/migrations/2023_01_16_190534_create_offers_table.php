<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string('company_name');
            $table->string('company_sub_title');
            $table->string('company_logo');
            $table->string("slug")->default("0");
            $table->string('offer_project_name');
            $table->mediumText('offer_description');
            $table->mediumText('offer_requirement_analysis');
            $table->string('offer_request_title');
            $table->mediumText('offer_request_description');
            $table->string('offer_cost_title');
            $table->mediumText('offer_cost_description');
            $table->string('offer_bidder_company');
            $table->string('offer_status')->default("0");
            $table->string('offer_color');
            $table->string('offer_delivery_time');
            $table->string('offer_price');
            $table->string('offer_bid_time');
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
        Schema::dropIfExists('offers');
    }
};
