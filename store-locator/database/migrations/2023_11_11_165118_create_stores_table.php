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
            $table->string('store_name');
            $table->string('address');
            $table->string('telephone');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->string('store_type');
            $table->string('tags');
            $table->string('photo')->nullable();
        
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('store_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
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
