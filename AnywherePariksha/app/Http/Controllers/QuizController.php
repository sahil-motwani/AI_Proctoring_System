<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $quiz_id = $request['quiz_id'];
        $student_id = $request['student_id'];
        if(!$this->hasStudentSubmittedTheQuiz($student_id, $quiz_id)){
            $questions = DB::table('quiz_question')
                ->join('questions', 'quiz_question.question_id', 'questions.question_id')
                ->where('quiz_question.quiz_id', $quiz_id)
                ->groupBy('questions.question_id')
                ->get();
            $answers =  DB::table('quiz_question')
                ->join('questions', 'quiz_question.question_id', 'questions.question_id')
                ->join('answers', 'answers.question_id', 'questions.question_id')
                ->where('quiz_question.quiz_id', $quiz_id)
                ->groupBy('answers.answer_id')
                ->get();
            $quiz_duration = DB::table('quiz')->where('quiz_id', $quiz_id)->select('duration')->first()->duration;
            return view ('quiz', compact('questions', 'answers', 'quiz_id', 'quiz_duration', 'student_id'));
        }else{
            return redirect()->back()->with('error_code', 5);
        }

    }

    public function store(Request $request){
        $data = array(
            "quiz_name"=>$request['quiz_name'],
            "quiz_marks"=>$request['quiz_marks'],
            "quiz_type"=>$request['quiz_type'],
            "duration"=>$request['duration'],
            "start_dt"=>strftime('%Y-%m-%d %H:%M:%S', strtotime(($request['start_dt']))),
            "start_dt"=>strftime('%Y-%m-%d %H:%M:%S', strtotime(($request['start_dt']))),
            "passing_marks_percentage"=>$request['passing_marks_percentage'],
            "status"=>$request['status'],
            "subject_id"=>4
        );
        DB::table('quiz')->insert($data);
        return redirect(route('view_all_quizzes'));
    }

    public function addQuizQuestion(){

    }

    public function getAllQuizzes()
    {
        $quizzes = Quiz::all();
        return view ('admin.quiz.index', compact('quizzes'));
    }

    public function assignQuizIndex(Request $request){
        $students = DB::table('student')
            ->join("users", "users.id", "student.user_id")
            ->get();
        $quizzes = Quiz::all();
        return view('admin.quiz.assign_quiz', compact('students', 'quizzes'));
    }

    public function assignQuizToStudent(Request $request){
//        dd($request['selected_students']);
        foreach ($request['selected_students'] as $student_id){
            $data[] = array("quiz_id"=>$request['quiz_id'], "student_id"=>$student_id);
        }
        DB::table('quiz_assigned_to')->insert($data);
        return redirect(route('view_all_quizzes'));
    }

    public function submitQuiz(Request $request){


//        dd("Hello");
        $student_id = $request['student_id'];
       foreach ($request['questions'] as $key => $value){
           if($value == "null"){
               $data = ["quiz_id"=>$request['quiz_id'],
                           "question_id"=>$key,
                            "student_id"=>$student_id,
                            "isAttempted"=>0];
                DB::table('student_quiz_question')->insertGetId($data);
           }
           else{
               $data = ["quiz_id"=>$request['quiz_id'],
                   "question_id"=>$key,
                   "student_id"=>$student_id,
                   "isAttempted"=>1];
               $id = DB::table('student_quiz_question')->insertGetId($data);
               DB::table('student_quiz_question_answer')
                   ->insert(array(
                                "student_quiz_question_id"=>$id,
                                "answer_id"=>$value
                            ));
           }

       }
//       $this->generateResults($request);
    }


    public function hasStudentSubmittedTheQuiz($student_id, $quiz_id){
//        dd($student_id);
//        if(count(DB::table('student_quiz_question')
//            ->where('student_id', $student_id)
//            ->where('quiz_id', $quiz_id)
//            ->get()) > 0){
//            dd(DB::table('student_quiz_question')
//                   ->where('student_id', $student_id)
//                   ->where('quiz_id', $quiz_id)
//                   ->get());
//            return true;
//        }
        return false;

    }

}
