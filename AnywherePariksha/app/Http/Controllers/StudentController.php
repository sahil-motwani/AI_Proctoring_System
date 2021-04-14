<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{

    private static $student_quiz_log_id = 0;

    public function index(){
        $quizzes = DB::table('quiz_assigned_to')
            ->join('quiz', 'quiz.quiz_id', 'quiz_assigned_to.quiz_id')
            ->join('student', 'student.student_id', 'quiz_assigned_to.student_id')
            ->where('student.user_id', Auth::id())
            ->get();
        $student_id = DB::table('student')->where('user_id', Auth::id())->first()->student_id;
//        DB::connection()->enableQueryLog();
//        Log::info(print_r(DB::getQueryLog(), true));
//        dd(Auth::id());
        return view('student.index', compact( 'quizzes', 'student_id'));
    }

    public function getAllStudents(){
        $students = DB::table('student')
            ->join('user', 'user.user_id', 'student.user_id')
            ->get();
        return view('admin.student.index', compact('students'));
    }


    public function getAssignedQuiz(Request $request){

    }

    /**
     * @return int
     */
    public static function getStudentQuizLogId(Request $request)
    {
        if(self::$student_quiz_log_id == -1)
            self::$student_quiz_log_id = DB::table('student_image_log')->where('student_id', $request['student_id'])->first()->id;
        return self::$student_quiz_log_id;
    }

    public function storeStudentImage(Request $request){
//        dd($request['image']);
        $student_quiz_log_id = self::getStudentQuizLogId($request);
        $img_cat = $request['img_cat'];

        $path = $request->file('image')->store('public/images');
        echo $path;
        DB::table('student_image_log')
            ->insert(array(
                         "student_quiz_log_id"=>1,
                         "img_cat"=>$img_cat,
                         "img"=>str_replace('public/', '', $path)
        ));
    }

    public function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' );
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp );

        return $output_file;
    }
}
