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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('script_id')->constrained('scripts')->onDelete('cascade');
            $table->unsignedInteger('order_no');
            $table->string('name')->nullable();
            $table->string('action')->nullable();
            $table->string('media')->nullable();
            $table->string('projection')->nullable();
            $table->string('light')->nullable();
            $table->string('microphone')->nullable();
            $table->string('note')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();

            $table->unique(['script_id', 'order_no']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
