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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade'); // Relasi ke tabel exams
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users (siswa)
            $table->foreignId('exam_question_id')->constrained('exam_questions')->onDelete('cascade'); // Relasi ke tabel exam_questions
            $table->string('answer'); // Jawaban siswa
            $table->boolean('is_correct')->default(false); // Menandai apakah jawaban siswa benar atau salah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
