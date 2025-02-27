<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); //店舗ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //会員ID
            $table->dateTime('reservation_date');//予約日時
            $table->integer('number_of_people');//予約人数
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *@return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
