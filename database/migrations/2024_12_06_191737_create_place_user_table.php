<?php

use App\Models\Place;
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
        Schema::create('place_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Place::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_user');
    }
};
