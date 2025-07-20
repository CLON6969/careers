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
        // Applicant Certifications
        Schema::create('applicant_certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('certification_type');
            $table->string('issuing_organization');
            $table->boolean('registered_with_authority')->default(false);
            $table->string('registration_number')->nullable();
            $table->string('authority_certificate_path')->nullable();
            $table->string('level')->nullable();
            $table->enum('status', ['obtained', 'in_progress'])->default('obtained');
            $table->date('obtained_date')->nullable();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
     Schema::dropIfExists('applicant_certifications');
    }
};
