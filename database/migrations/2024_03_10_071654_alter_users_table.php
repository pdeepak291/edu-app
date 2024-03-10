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
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('name');
            $table->date('dob')->after('gender')->nullable();
            $table->string('image')->after('dob')->default('user.jpg');
            $table->string('mobile',15)->after('image');
            $table->boolean('status')->after('password')->default('1')->comment('0:Inactive, 1:Active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('image');
            $table->dropColumn('mobile');
            $table->dropColumn('status');
        });
    }
};
