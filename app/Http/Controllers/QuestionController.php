<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Question;
use App\Http\Models\Answer;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $question = array();
        $filter = array();
        $ques = Question:: select("question.*",DB::raw("(SELECT COUNT(*) FROM answer WHERE question = question.id) AS answer_count"))
            ->where('status',1);
        if(isset($request->product)){
            $ques->where('product','=',$request->product);
            $filter['product'] =$request->product;
        }
        $question['questions'] = $ques->orderBy('id','desc')->get();
        foreach($question['questions']  as $q):
            $question['answers'][$q->id] = Answer::where('question',$q->id)->where('status',1)->get();
        endforeach;
        return response()->json($question,200);
    }
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return response()->json($question, 200);
    }
    public function Anstore(Request $request)
    {
        $question = Answer::create($request->all());
        return response()->json($question, 200);
    }
    public function update(Request $request)
    {
        $req = array(      'status' => $request->status);

        Question::where('id',$request->id )->update($req);

        return response()->json($review, 200);
    }
}
