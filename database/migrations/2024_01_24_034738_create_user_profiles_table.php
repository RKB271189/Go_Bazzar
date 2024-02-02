<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->unsignedTinyInteger('province_id')->index();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->unsignedSmallInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('citys')->onDelete('NO ACTION');
            $table->bigInteger('contact_no')->nullable();
            $table->string('postal_code', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
