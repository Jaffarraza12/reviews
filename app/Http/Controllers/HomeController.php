<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Review;
use App\Http\Models\Question;
use App\Http\Models\Answer;
use App\Http\Models\Contact;
use App\Http\Models\Warranty;

use Illuminate\Support\Facades\DB;

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

        $reviews = Review::orderByRaw('updated_at - created_at DESC')->limit(5)->get();
        $questions = Question::select('question.*',DB::raw('( SELECT count(*) FROM `answer` WHERE question = question.id ) as answerCount'))->orderByRaw('updated_at - created_at DESC')->get();
        $contacts= Contact::orderByRaw('updated_at - created_at DESC')->limit(5)->get();
        $warranties = Warranty::orderByRaw('updated_at - created_at DESC')->limit(5)->get();
        return view('home',compact('reviews','questions','contacts','warranties'));
    }
}
