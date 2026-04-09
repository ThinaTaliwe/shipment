<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('ports', function (Blueprint $table) {
            $table->id();
            $table->string('unlocode')->unique();
            $table->string('name');
            $table->string('country_code', 2);
            $table->string('timezone')->default('UTC');
            $table->geography('location', 'point', 4326)->nullable();
            $table->string('website')->nullable();
            $table->string('contact_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->spatialIndex('location');
        });
    }
    public function down(): void { Schema::dropIfExists('ports'); }
};
