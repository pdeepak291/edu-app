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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('menu_title');
            $table->string('menu_icon')->nullable();
            $table->string('menu_class')->nullable();
            $table->string('menu_route');
            $table->string('menu_category');
            $table->string('menu_type');
            $table->string('menu_warning')->nullable();
            $table->string('menu_target')->nullable();
            $table->unsignedBigInteger('menu_order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
