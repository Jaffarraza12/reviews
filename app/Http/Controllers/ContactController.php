<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Contact;
use App\Http\Models\Warranty;
use App\Http\Models\Retailer;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    public function warranty(Request $request)
    {
        $warranty = Warranty::create($request->all());
        return response()->json($warranty, 201);
    }

    public function retailer(Request $request)
    {
        $warranty = Retailer::create($request->all());
        return response()->json($warranty, 201);
    }

    public function HTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $contact = Contact::where('id',$request->id)->first();

      $html .= '<div class="row">
          <div class="col-md-3">Name</div>
          <div class="col-md-9">'.$contact->name.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$contact->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Phone Number</div>
          <div class="col-md-9">'.$contact->phone_number.'</div>
      </div><div class="row">
          <div class="col-md-3">Message</div>
          <div class="col-md-9">'.$contact->message.'</div>
      </div><div class="row">
          <div class="col-md-3">Conerning</div>
          <div class="col-md-9">'.$contact->concerning.'</div>
      </div><div class="row">
          <div class="col-md-3">Created on</div>
          <div class="col-md-9">'.date('d M Y',strtotime($contact->created_at)).'</div>
      </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }

    public function WARRANTYHTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $warranty = Warranty::where('id',$request->id)->first();

      $html .= '<div class="row">
          <div class="col-md-3">Name</div>
          <div class="col-md-9">'.$warranty->full_name.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$warranty->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Purchase</div>
          <div class="col-md-9">'.$warranty->purchase_from.'</div>
      </div><div class="row">
          <div class="col-md-3">Message</div>
          <div class="col-md-9">'.$warranty->comment.'</div>
      </div><div class="row">
          <div class="col-md-3">Sell price</div>
          <div class="col-md-9">'.$warranty->sell_price.'</div>
      </div><div class="row">
          <div class="col-md-3">Created on</div>
          <div class="col-md-9">'.date('d M Y',strtotime($contact->created_at)).'</div>
      </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }

    public function WARRANTYHTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $warranty = Warranty::where('id',$request->id)->first();

      $html .= '<div class="row">
          <div class="col-md-3">Name</div>
          <div class="col-md-9">'.$warranty->full_name.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$warranty->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Purchase</div>
          <div class="col-md-9">'.$warranty->purchase_from.'</div>
      </div><div class="row">
          <div class="col-md-3">Message</div>
          <div class="col-md-9">'.$warranty->comment.'</div>
      </div><div class="row">
          <div class="col-md-3">Sell price</div>
          <div class="col-md-9">'.$warranty->sell_price.'</div>
      </div><div class="row">
          <div class="col-md-3">Created on</div>
          <div class="col-md-9">'.date('d M Y',strtotime($contact->created_at)).'</div>
      </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }


    public function RETAILERHTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $retailer = Retailer::where('id',$request->id)->first();

      $html .= '<div class="row">
          <div class="col-md-3">Company Name</div>
          <div class="col-md-9">'.$retailer->company_name.'</div>
      </div><div class="row">
          <div class="col-md-3"> Name</div>
          <div class="col-md-9">'.$retailer->name.'</div>
      </div><div class="row">
          <div class="col-md-3">Phone</div>
          <div class="col-md-9">'.$retailer->phone_number.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$retailer->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Website</div>
          <div class="col-md-9">'.$retailer->website.'</div>
      </div><div class="row">
          <div class="col-md-3">By From </div>
          <div class="col-md-9">'.$retailer->website.'</div>
      </div><div class="row">
          <div class="col-md-3">Message</div>
          <div class="col-md-9">'.$retailer->message.'</div>
      </div><div class="row">
          <div class="col-md-3">Created at</div>
          <div class="col-md-9">'.date('d M Y',strtotime($retailer->created_at)).'</div>
      </div>';

      $json['html'] =  $html;
      echo json_encode($json);

    }

}
