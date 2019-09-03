<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Review;

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
        $review = Review::orderBy('id', 'desc')->limit(5)->get();
        return view('home');
    }
}
