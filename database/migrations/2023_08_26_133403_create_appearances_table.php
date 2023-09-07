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
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('button_color', 7)->default('#000000');
            $table->string('button_font_color', 7)->default('#000000');
            $table->boolean('button_fill')->default(false);
            $table->boolean('button_outline')->default(true);
            $table->string('button_rounded', 5)->default('0');
            $table->string('button_shadow')->default('shadow-none');
            $table->string('background_color', 7)->default('#FFFFFF');
            $table->string('font_color', 7)->default('#000000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appearances');
    }
};
