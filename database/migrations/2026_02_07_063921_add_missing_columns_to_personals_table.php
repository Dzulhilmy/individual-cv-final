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
            // Add all columns that your error message says are missing
            if (! Schema::hasColumn('personals', 'job_title')) {
                $table->string('job_title')->nullable()->after('name');
            }
            if (! Schema::hasColumn('personals', 'email')) {
                $table->string('email')->nullable()->after('job_title');
            }
            if (! Schema::hasColumn('personals', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (! Schema::hasColumn('personals', 'address')) {
                $table->string('address')->nullable()->after('phone');
            }
            if (! Schema::hasColumn('personals', 'summary')) {
                $table->text('summary')->nullable()->after('address');
            }
            if (! Schema::hasColumn('personals', 'image')) {
                $table->string('image')->nullable()->after('summary');
            }
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
