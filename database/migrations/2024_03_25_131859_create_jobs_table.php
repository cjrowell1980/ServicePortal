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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            // Machine Relationship
            $table->unsignedBigInteger('machine')->index();
            $table->foreign('machine')->references('id')->on('machine');

            // Status Relationship
            $table->unsignedBiginteger('status')->index();
            $table->foreign('status')->references('id')->on('job_statuses');

            // Jobtype Relationship
            $table->unsignedBigInteger('type')->index();
            $table->foreign('type')->references('id')->on('job_types');

            $table->string('job_ref')->unique();
            $table->string('reported');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
