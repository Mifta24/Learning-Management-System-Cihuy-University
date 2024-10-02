<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        return view('exams.index');
    }

    public function show(Exam $exam)
    {
        $examResult = Auth::user()
        ->results()
        ->where('exam_id', $exam->id)
        ->first();

        if ($examResult) {
            return redirect()->route('exam.result', $exam->id)->with('success', 'You have already taken this exam.');
        }

        $exam->load('questions');
        $questions = $exam->questions()->get();

        return view('exams.start', compact('exam', 'questions'));
    }

    public function submit(Request $request, Exam $exam)
    {

        $examResult = Auth::user()
        ->results()
        ->where('exam_id', $exam->id)
        ->first();

        if ($examResult) {
            return redirect()->route('exam.result', $exam->id)->with('success', 'You have already taken this exam.');
        }

        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        DB::transaction(function () use ($request, $exam) {
            // Simpan jawaban siswa
            foreach ($request->answers as $question_id => $answer) {

                $question = ExamQuestion::where('id', $question_id)->first();

                if ($question->correctAnswer->answer == $answer) {
                    $isCorrect = true;
                }

                // $question_id adalah kunci (ID pertanyaan)
                // $answer_id adalah nilai (ID jawaban yang dipilih)
                // Misal simpan ke database
                $studentAnswers = StudentAnswer::create([
                    'user_id' => Auth::user()->id,
                    'exam_id' => $exam->id,
                    'exam_question_id' => $question_id,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            // Simpan nilai siswa
            $result = $studentAnswers->where('is_correct', true)->where('user_id', Auth::user()->id)
            ->where('exam_id', $studentAnswers->exam_id)->count();
            $result = $result * 100 / ($exam->questions->count());

            // Simpan hasil ujian
            ExamResult::create([
                'user_id' => Auth::user()->id,
                'exam_id' => $studentAnswers->exam_id,
                'score' => $result,
            ]);
        });


        return redirect()->route('exam.result', $exam->id)->with('success', 'Exam submitted successfully.');
    }

    public function result(Exam $exam)
    {

        $examResult = Auth::user()
        ->results()
        ->where('exam_id', $exam->id)
        ->first();

        if (!$examResult) {
            return redirect()->route('courses.show', $exam->courses->slug)->with('success', 'You have already taken this exam.');
        }

        $result = ExamResult::where('user_id', Auth::user()->id)
                        ->where('exam_id', $exam->id)
                        ->with(['user.answers' => function($query) use ($exam) {
                            $query->where('exam_id', $exam->id);
                        }])
                        ->first();

        return view('exams.result', compact('result'));
    }
}
