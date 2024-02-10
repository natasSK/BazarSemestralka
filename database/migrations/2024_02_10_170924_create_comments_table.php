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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Väzba na užívateľa, ku ktorému patrí komentár
            $table->foreignId('author_id')->constrained('users'); // Väzba na užívateľa, ktorý vytvoril komentár
            $table->text('text');
            $table->timestamp('published_at')->default(now());
            $table->integer('recommendation')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
