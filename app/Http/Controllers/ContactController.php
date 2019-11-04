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

}
