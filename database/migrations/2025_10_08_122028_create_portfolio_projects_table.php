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
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('industry');
            $table->string('complexity');
            $table->string('image')->nullable();
            $table->string('fallback_image')->nullable();
            $table->json('metrics')->nullable(); // Store metrics as JSON
            $table->json('tech_stack')->nullable(); // Store tech stack as JSON
            $table->string('color')->default('accent');
            $table->longText('case_study_content')->nullable(); // Rich HTML content
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
    }
};