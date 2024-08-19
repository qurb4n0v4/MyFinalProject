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
        Schema::create('my_jobs', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary', 10, 2)->nullable();
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'temporary', 'internship']);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->text('requirements')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('application_deadline')->nullable();
            $table->enum('experience_level', ['junior', 'mid', 'senior'])->nullable();
            $table->boolean('remote_possible')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_jobs');
    }
};
