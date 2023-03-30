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
        Schema::create('user_shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("first_name", 255);
            $table->string("last_name", 255);
            $table->text("address");
            $table->text("address_line_1");
            $table->string("city", 255);
            $table->string("state", 255);
            $table->string("zipcode", 255);
            $table->string("country", 255);
            $table->string("phone_number", 255);

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
        Schema::dropIfExists('user_shipping_addresses');
    }
};
