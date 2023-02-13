<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('background_color', 7)->default("#FFFFFF");
            $table->string('button_color',7)->default("#FFFFFF");
            $table->string('button_font_color', 7)->default("#000000");
            $table->boolean('button_fill')->default(false);
            $table->boolean('button_outline')->default(false);
            $table->string('font_color', 7)->default("#000000");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appearances');
    }
};
