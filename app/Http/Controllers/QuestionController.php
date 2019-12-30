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
    public function HTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $question = Question::where('id',$request->id)->first();
      $answers = Answer::where('question',$request->id)->get();
      if($question->staus) {
        $status= 'Active';
      } else {
        $status= 'Non active';
      }
      $html .= '<div class="row">
          <div class="col-md-3">Name</div>
          <div class="col-md-9">'.$question->name.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$question->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Question</div>
          <div class="col-md-9">'.$question->question.'</div>
      </div>';
      if(sizeof($answers) > 0){
        $html .= "<div style='background:#b0b0b0'> ";
          foreach($answers as $ans){
            $html .= '<div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">'.$ans->answer.'</div>
            </div>';
          }
        $html .= '</div>';
      }
      $html .= '<div class="row">
          <div class="col-md-3">Created at</div>
          <div class="col-md-9">'.date('d M Y',strtotime($question->created_at)).'</div>
          </div><div class="row">
              <div class="col-md-3">status</div>
              <div class="col-md-9">'.$status.'</div>
          </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }



}
