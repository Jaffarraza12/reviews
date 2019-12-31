<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Complain;

class ComplainController extends Controller
{
    //
    public function store(Request $request)
    {
        $complain = Complain::create($request->all());
        return response()->json($complain, 200);
    }

    public function HTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $complain = Complain::where('id',$request->id)->first();

      $html .= '<div class="row">
          <div class="col-md-3">Name</div>
          <div class="col-md-9">'.$complain->name.'</div>
      </div><div class="row">
          <div class="col-md-3">Order No</div>
          <div class="col-md-9">'.$complain->order.'</div>
      </div><div class="row">
          <div class="col-md-3">Type</div>
          <div class="col-md-9">'.$complain->type.'</div>
      </div><div class="row">
          <div class="col-md-3">Message</div>
          <div class="col-md-9">'.$complain->message.'</div>
      </div><div class="row">
          <div class="col-md-3">Created On</div>
          <div class="col-md-9">'.date('d M Y',strtotime($complain->created_at)).'</div>
      </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }
}
