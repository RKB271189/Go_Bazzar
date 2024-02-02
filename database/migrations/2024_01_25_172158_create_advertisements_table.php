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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id')->index();
            $table->foreign('profile_id')->references('id')->on('user_profiles')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('province_id')->index();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('NO ACTION');
            $table->unsignedSmallInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('citys')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('sub_category_id')->index();
            $table->foreign('sub_category_id')->references('id')->on('sub_categorys')->onDelete('NO ACTION');
            $table->string('thumb_nail', 100)->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->string('title', 100);
            $table->text('description');
            $table->dateTime('expiry_date')->nullable();
            $table->text('address');
            $table->tinyInteger('is_available')->default(1);
            $table->tinyInteger('is_sold')->default(0);
            $table->tinyInteger('is_approved')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
