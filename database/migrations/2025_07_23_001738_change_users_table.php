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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('linkedin_id')->nullable()->after('email');
            $table->text('linkedin_token')->nullable()->after('linkedin_id');
            $table->string('avatar')->nullable()->after('linkedin_token');
            $table->boolean('is_candidate')->default(true)->after('avatar');
            $table->boolean('is_recruiter')->default(false)->after('is_candidate');
            $table->boolean('is_admin')->default(false)->after('is_recruiter');
            $table->string('password')->nullable()->change();
            $table->string('remember_token')->nullable()->change();
            $table->timestamp('email_verified_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['linkedin_id', 'linkedin_token', 'avatar', 'is_candidate', 'is_recruiter', 'is_admin']);
        });
    }
};
