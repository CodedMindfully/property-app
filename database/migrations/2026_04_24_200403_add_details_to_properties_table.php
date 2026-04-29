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
        Schema::table('properties', function (Blueprint $table) {
            //
            $table->foreignId('property_type_id')->nullable()->constrained('property_types')->nullOnDelete();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->text('description')->nullable();
            $table->integer('floor_size')->nullable();
            $table->boolean('is_joint_venture')->default(false);
            $table->date('completion_date')->nullable();
            $table->string('brochure_pdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            //Drop the foreign key first (standard laravel reqirement)
            $table->dropForeign(['property_type_id']);

            // Drop all the columns I added
            $table->dropColumn([
                'property_type_id',
                'bedrooms',
                'bathrooms',
                'description',
                'floor_size',
                'is_joint_venture',
                'completion_date',
                'brochure_pdf'
            ]);
        });
    }
};
