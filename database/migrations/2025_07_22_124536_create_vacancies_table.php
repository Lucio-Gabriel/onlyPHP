<?php

use App\Models\User;
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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('city', 100)->nullable(false);
            $table->string('state', 2)->nullable(false);
            $table->string('company', 255)->nullable(false);
            $table->string('stacks', 255)->nullable();
            $table->decimal('salary', 10, 2)->nullable()->default(null);
            $table->enum('type', ['full-time', 'part-time', 'contract', 'temporary'])->default('full-time');
            $table->enum('contract_type', ['pj', 'clt', 'trainee'])->default('pj');
            $table->enum('location', ['remote', 'hybrid', 'on-site'])->default('on-site');
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
