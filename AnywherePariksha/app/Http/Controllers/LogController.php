<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index(){
        $quizzes = Quiz::all();
        return view('admin.logs.index', compact('quizzes'));
    }

    public function showQuizLogs(Request $request){
        $quiz_id = $request['quiz_id'];
        $quiz_logs = DB::table('student_quiz_logs')
            ->join('quiz', 'quiz.quiz_id', 'student_quiz_logs.quiz_id')
            ->join('student', 'student.student_id', 'student_quiz_logs.student_id')
            ->join('users', 'users.id', 'student.user_id')
            ->where('student_quiz_logs.quiz_id', $quiz_id)
            ->groupBy('student_quiz_logs.quiz_id')
            ->get();
        return view('admin.logs.quiz_log', compact('quiz_logs'));
    }

    public function showStudentLogs($quizID, $studentID){
        $student_logs = DB::table('student_image_log')
                        ->join('student_quiz_logs', 'student_quiz_logs.id', 'student_image_log.student_quiz_log_id')
//                        ->where('student_quiz_logs.student_id', $studentID)
//                        ->where('student_quiz_logs.quiz_id', $quizID)
                        ->get();
//        dd($student_logs);
        return view('admin.logs.student_quiz_log', compact('student_logs'));
    }
}
