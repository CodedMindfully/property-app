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
            //change id to unsignedBigInteger
            //add a second argument true to tell Laravel to keep
            //Auto increment functionality active while changing the type
            $table->unsignedBigInteger('id', true)->change();

        });
    }

    /**
     * Reverse the migrations.
     * If property ID ever grows very large (2.1 billion)
     * trying to change back to standard int will cause
     * an out of range error and fail.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            //If I were reversing it I will go back 
            //to standard integer
            $table->integer('id', true)->change();
        });
    }
};
