<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create($this->prefix.'shipping_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->nullable()->constrained($this->prefix.'shipping_providers');
            $table->foreignId('zone_id')->nullable()->constrained($this->prefix.'shipping_zones');
            $table->foreignId('location_id')->nullable()->constrained($this->prefix.'shipping_locations');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('identifier')->unique();
            $table->string('wsCode');
            $table->json('data');
            $table->bigInteger('order')->default(0);
            $table->tinyInteger('is_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix.'shipping_options');
    }
};
