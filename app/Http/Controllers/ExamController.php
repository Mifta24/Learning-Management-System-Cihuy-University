<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return view('exams.index');
    }

    public function show(Exam $exam)
    {
        $exam->load('questions');
        $questions = $exam->questions()->get();

        return view('exams.start', compact('exam', 'questions'));
    }

    public function submit(Request $request, Exam $exam)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        // Simpan jawaban siswa
        foreach ($request->answers as $question_id => $answer_id) {
            // $question_id adalah kunci (ID pertanyaan)
            // $answer_id adalah nilai (ID jawaban yang dipilih)
            // Misal simpan ke database
            StudentAnswer::create([
                'exam_id' => $exam->id,
                'question_id' => $question_id,
                'answer' => $answer_id,
            ]);
        }


        return redirect()->route('exam.result', $exam->id)->with('success', 'Exam submitted successfully.');
    }

  
}
