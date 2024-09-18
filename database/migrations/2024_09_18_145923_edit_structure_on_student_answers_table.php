<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Rename table student_answers ke student_answers_old
        Schema::rename('student_answers', 'student_answers_old');

        // Buat tabel baru dengan primary key
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('exam_question_id')->constrained('exam_questions')->onDelete('cascade');
            $table->string('answer');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });

        // Pindahkan data dari tabel lama ke tabel baru
        DB::table('student_answers_old')->orderBy('id')->chunk(100, function ($oldAnswers) {
            foreach ($oldAnswers as $oldAnswer) {
                DB::table('student_answers')->insert((array) $oldAnswer);
            }
        });

        // Hapus tabel lama
        Schema::dropIfExists('student_answers_old');
    }

};
