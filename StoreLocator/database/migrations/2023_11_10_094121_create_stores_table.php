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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('storeName')->required();
            $table->string('storePhoto')->required();
            $table->string('storeAddress')->required();
            $table->string('telePhoneNumber')->required();
            $table->string('storeType_id')->constrained();
            $table->string('company_id')->constrained();
            $table->string('longitude')->required();
            $table->string('latitude')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
