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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id')->index();
            $table->foreign('profile_id')->references('id')->on('user_profiles')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('province_id')->index();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('NO ACTION');
            $table->unsignedSmallInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('citys')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('sub_category_id')->index();
            $table->foreign('sub_category_id')->references('id')->on('sub_categorys')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('sub_sub_category_id')->index();
            $table->foreign('sub_sub_category_id')->references('id')->on('sub_sub_categorys')->onDelete('NO ACTION');
            $table->string('business_picture', 100)->nullable();
            $table->string('business_email', 100);
            $table->bigInteger('business_no')->nullable();
            $table->string('title', 100);
            $table->text('address');
            $table->tinyInteger('is_approved')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
