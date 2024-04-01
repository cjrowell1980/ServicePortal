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

            $table->unsignedBigInteger('engineer')->index();
            $table->foreign('engineer')->references('id')->on('engineers');

            $table->unsignedBigInteger('status')->index();
            $table->foreign('status')->references('id')->on('visit_statuses');

            $table->string('notes');
            $table->boolean('js'); // jobsheet
            $table->boolean('ph'); // photos
            $table->boolean('pi'); // payable invoice
            $table->boolean('ci'); // chargeable invoice

            $table->boolean('active'); // 0 = closed
            $table->longText('report');

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
