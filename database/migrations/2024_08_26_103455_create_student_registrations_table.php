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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('s_first');
            $table->string('s_middle')->nullable();
            $table->string('s_last');
            $table->string('s_dob');
            $table->string('s_phone');
            $table->string('s_email');
            $table->string('s_gender');
            $table->string('s_country');
            $table->string('s_province');
            $table->string('s_district');
            $table->string('s_city');
            $table->string('s_ward');
            $table->string('s_course');
            $table->string('s_about');
            $table->string('g_first');
            $table->string('g_middle')->nullable();
            $table->string('g_last');
            $table->string('relation');
            $table->string('g_phone');
            $table->string('g_email')->nullable();
            $table->string('e_phone')->nullable();
            $table->string('college');
            $table->string('faculty');
            $table->decimal('c_gpa', 5, 2);
            $table->string('c_country');
            $table->string('c_province');
            $table->string('c_district');
            $table->string('c_city');
            $table->string('referred')->nullable();
            $table->string('r_others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
