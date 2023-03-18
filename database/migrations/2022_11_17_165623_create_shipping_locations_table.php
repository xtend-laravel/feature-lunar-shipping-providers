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
        Schema::create($this->prefix.'shipping_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId($this->prefix.'parent_id')->nullable()->constrained($this->prefix.'shipping_locations');
            $table->foreignId($this->prefix.'zone_id')->constrained($this->prefix.'shipping_zones');
            $table->string('code');
            $table->string('type');
            $table->string('name');
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
        Schema::dropIfExists($this->prefix.'shipping_locations');
    }
};
