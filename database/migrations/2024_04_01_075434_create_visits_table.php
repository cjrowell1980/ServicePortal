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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('job')->index();
            $table->foreign('job')->references('id')->on('jobs');

            $table->unsignedBigInteger('engineer')->index()->nullable();
            $table->foreign('engineer')->references('id')->on('engineers');

            $table->unsignedBigInteger('status')->index();
            $table->foreign('status')->references('id')->on('visit_statuses');

            $table->string('notes');
            $table->boolean('js')->default(false); // jobsheet
            $table->boolean('ph')->default(false); // photos
            $table->boolean('pi')->default(false); // payable invoice
            $table->boolean('ci')->default(false); // chargeable invoice

            $table->boolean('active')->default(1); // 0 = closed
            $table->longText('report')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
