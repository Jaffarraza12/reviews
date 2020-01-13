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
        $per_page = 15;
        $questions = Question::select('question.*',DB::raw('( SELECT count(*) FROM `answer` WHERE question = question.id ) as answerCount'));

        if($request->name <> ""){
          $questions =  $questions->where('name','like','%'.$request->name.'%');
        }
        $questions = $questions->orderBy('id','DESC')->paginate($per_page);
        return response()->json($questions,200);
    }

    public function api(Request $request)
    {
        $question = array();
        $filter = array();
        $questions = Question::select('question.*',DB::raw('( SELECT count(*) FROM `answer` WHERE question = question.id ) as answerCount'));
        if($request->product){
            $questions = $questions->where('product',$request->product)
        }
        $questions = $questions->orderBy('id','DESC')->get();
        return response()->json($questions,200);
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
        $req = array(  'status' => $request->status);

        $question = Question::where('id',$request->id )->update($req);

        return response()->json($question, 200);
    }
    public function HTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $question = Question::where('id',$request->id)->first();
      $answers = Answer::where('question',$request->id)->get();
      if($question->status) {
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
        $html .= "<div >
          <h3 style='text-align:center;'>ANSWERS </h3>";
          foreach($answers as $ans){
            $html .= '<div class="row" style="background:#b0b0b0;margin:10px 0;">
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

    function GetAllQuestions(Request $request){
      $per_page = 15;
      if($request->page <> null) {
          $currentPage =  $request->page;
          Paginator::currentPageResolver(function () use ($currentPage) {
              return $currentPage;
          });
      }
      if($request->name <> ""){
          $reviews = Review::where('name','like','%'.$request->name.'%')->Orderby('id','desc')->paginate($per_page);
        } else {
          $reviews = Review::Orderby('id','desc')->paginate($per_page);
        }
        return response()->json($reviews, 200);

    }


}
