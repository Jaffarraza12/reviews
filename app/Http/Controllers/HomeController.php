<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Review;
use App\Http\Models\Question;
use App\Http\Models\Answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::orderBy('id', 'desc')->limit(5)->get();
        $questions  = Question::orderBy('id', 'desc')->limit(5)->get();
        return view('home',compact('reviews','questions'));
    }
}
