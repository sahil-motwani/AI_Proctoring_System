<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $quizzes = Quiz::all();
        return view ('admin.quiz.question.index', compact('questions', 'quizzes'));
    }


    public function store(Request $request){
        foreach ($request['selected_questions'] as $question_id){
            $data[] = array("quiz_id"=>$request['quiz_id'], "question_id"=>$question_id, "no_of_options"=>4);
        }
        DB::table('quiz_question')->insert($data); // Query Builder approach
        return redirect(route('view_all_quizzes'));
    }
}
