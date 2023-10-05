<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('top_title');
            $table->string('title');
            $table->string('sub_title');
            $table->string('offer');
            $table->string('link');
            $table->string('category_text');
            $table->string('image');
<<<<<<< HEAD
=======
            $table->string('category_text');
>>>>>>> 3d5486bdc804e03d6b411aa5f3fcd2c038a37f7e
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_sliders');
    }
};
