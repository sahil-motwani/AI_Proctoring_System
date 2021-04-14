<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $quizzes = Quiz::all();
        return view ('admin.index', compact('quizzes'));
    }

}
