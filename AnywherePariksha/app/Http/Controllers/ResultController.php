<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{

    public function index(Request $request){
        $results = DB::table('quiz_student_marks')
                                        ->join('student', 'student.student_id', 'quiz_student_marks.student_id')
                                        ->join('users', 'users.id', 'student.student_id')
                                        ->where('quiz_id', $request['quiz_id'])
                                        ->get();
        return view('admin.results.index', compact('results'));
    }

    public function generateResults(Request $request)
    {
        DB::enableQueryLog();
        $quiz_id = $request['quiz_id'];

        if(DB::table('quiz')->where('quiz_id', $quiz_id)->first()->is_result_generated == 0){
            $correct_question_answers = DB::table('quiz_question')
                ->select(DB::raw('correct_question_answer.*, question_marks.*'))
                ->join('correct_question_answer', 'correct_question_answer.question_id', 'quiz_question.question_id')
                ->join('question_marks', 'question_marks.question_id', 'quiz_question.question_id')
                ->where('quiz_question.quiz_id', $quiz_id)
                ->groupBy('correct_question_answer.question_id')
                ->get();
            $quiz_students = DB::table('quiz_assigned_to')->where('quiz_assigned_to.quiz_id', $quiz_id)->get();
            Log::info(print_r(DB::getQueryLog(), true));
            foreach ($quiz_students as $quiz_student) {
                $totalMarks = 0;
                $student_question_answers = DB::table('student_quiz_question')
                    ->join(
                        'student_quiz_question_answer',
                        'student_quiz_question_answer.student_quiz_question_id',
                        'student_quiz_question.student_quiz_question_id'
                    )
                    ->where('student_quiz_question.student_id', $quiz_student->student_id)
                    ->where('student_quiz_question.quiz_id', $quiz_id)
                    ->get();

                foreach ($student_question_answers as $student_question_answer) {
                    $question_id = $student_question_answer->question_id;
                    $answer_id = $student_question_answer->answer_id;
                    $correct_answer = $correct_question_answers->firstWhere('question_id', $question_id);
                    if ($answer_id == $correct_answer->answer_id) {
                        $totalMarks += $correct_answer->marks;

                        DB::table('student_quiz_question')
                            ->where('student_quiz_question_id', $student_question_answer->student_quiz_question_id)
                            ->update(['marks' => $correct_answer->marks]);
                    }
                }
                DB::table('quiz_student_marks')->insert(
                    [
                        'quiz_id' => $quiz_id,
                        'student_id' => $quiz_student->student_id,
                        'marks' => $totalMarks
                    ]
                );
            }
            DB::table('quiz')
                ->where('quiz_id', $quiz_id)
                ->update(['is_result_generated'=>1]);
        }
        $results = DB::table('quiz_student_marks')
            ->join('student', 'student.student_id', 'quiz_student_marks.student_id')
            ->join('users', 'users.id', 'student.user_id')
            ->where('quiz_id', $request['quiz_id'])
            ->get();
        $quiz_name = DB::table('quiz')
            ->where('quiz_id', $quiz_id)
            ->first()->quiz_name;
        return view('admin.results.index', compact('results', 'quiz_name'));
    }
}
