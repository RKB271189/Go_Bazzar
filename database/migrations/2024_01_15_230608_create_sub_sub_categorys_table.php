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
        Schema::create('sub_sub_categorys', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('main_categorys')->onDelete('NO ACTION');
            $table->unsignedTinyInteger('sub_category_id')->index();
            $table->foreign('sub_category_id')->references('id')->on('sub_categorys')->onDelete('NO ACTION');
            $table->string('name', 150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_sub_categorys');
    }
};
