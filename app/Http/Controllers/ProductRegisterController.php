<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ProductRegister;
use Illuminate\Pagination\Paginator;

class ProductRegisterController extends Controller
{
    //
    public function index(Request $request)
    {
      $per_page = 15;
      if($request->page <> null) {
          $currentPage =  $request->page;
          Paginator::currentPageResolver(function () use ($currentPage) {
              return $currentPage;
          });
      }
      if($request->name <> ""){
          $products = ProductRegister::where('name','like','%'.$request->name.'%')->orderby('id','desc')->paginate($per_page);
        } else {
          $products = ProductRegister::orderby('id','desc')->paginate($per_page);
        }
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $pr= ProductRegister::create($request->all());
        return response()->json($pr, 200);
    }

        public function HTMLBLOCK(Request $request){
          $html = '';
          $status = '';
          $pr = ProductRegister::where('id',$request->id)->first();

          $html .= '<div class="row">
              <div class="col-md-3">Name</div>
              <div class="col-md-9">'.$pr->name.'</div>
          </div><div class="row">
              <div class="col-md-3">Email</div>
              <div class="col-md-9">'.$pr->email.'</div>
          </div><div class="row">
              <div class="col-md-3">Phone</div>
              <div class="col-md-9">'.$pr->phone_number.'</div>
          </div><div class="row">
              <div class="col-md-3">Country</div>
              <div class="col-md-9">'.$pr->country.'</div>
          </div><div class="row">
              <div class="col-md-3">State</div>
              <div class="col-md-9">'.$pr->state.'</div>
          </div><div class="row">
              <div class="col-md-3">City</div>
              <div class="col-md-9">'.$pr->city.'</div>
          </div><div class="row">
              <div class="col-md-3">Address</div>
              <div class="col-md-9">'.$pr->address.'</div>
          </div><div class="row">
              <div class="col-md-3">Date</div>
              <div class="col-md-9">'.date('d M Y',strtotime($pr->date)).'</div>
          </div><div class="row">
              <div class="col-md-3">Price</div>
              <div class="col-md-9">'.$pr->price.'</div>
          </div><div class="row">
              <div class="col-md-3">Model</div>
              <div class="col-md-9">'.$pr->model.'</div>
          </div><div class="row">
              <div class="col-md-3">Location</div>
              <div class="col-md-9">'.$pr->location.'</div>
          </div><div class="row">
              <div class="col-md-3">Created At</div>
              <div class="col-md-9">'.date('d M Y',strtotime($pr->created_at)).'</div>
          </div>';

          $json['html'] =  $html;
          echo json_encode($json);

        }

}
