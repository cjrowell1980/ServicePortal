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
        Schema::create('machine', function (Blueprint $table) {
            $table->id();

            // customer relationship
            $table->unsignedBigInteger('customer')->index();
            $table->foreign('customer')->references('id')->on('customers');

            $table->string('stock');
            $table->string('asset')->nullable();
            $table->string('make');
            $table->string('model');
            $table->string('serial');
            $table->year('yom');
            $table->date('warranty')->nullable();
            $table->integer('warranty_period')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine');
    }
};
