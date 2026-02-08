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
        Schema::table('personals', function (Blueprint $table) {
            // Rename 'summary' to 'objective' if you want, or just add these:
        // We use 'text' so you can write long paragraphs
        $table->text('education')->nullable();
        $table->text('experience')->nullable();
        $table->text('awards')->nullable();
        $table->text('skills')->nullable();

        // Reference 1
        $table->string('ref1_name')->nullable();
        $table->string('ref1_job')->nullable();
        $table->string('ref1_contact')->nullable();

        // Reference 2
        $table->string('ref2_name')->nullable();
        $table->string('ref2_job')->nullable();
        $table->string('ref2_contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personals', function (Blueprint $table) {
            //
        });
    }
};
